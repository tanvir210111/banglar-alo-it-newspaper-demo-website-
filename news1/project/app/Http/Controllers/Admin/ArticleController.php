<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Language;
use App\Models\Post;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Image;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // ✅ Create Article Page
    public function create()
    {
        $datas      = Category::whereNull('parent_id')->get();
        $languages  = Language::orderBy('id', 'desc')->get();
        $divisions  = Division::orderBy('name', 'asc')->get();

        return view('admin.article.create', compact('datas', 'languages', 'divisions'));
    }

    // ✅ Fetch Categories by Language
    public function language($id)
    {
        $datas = Language::find($id)->categories()->whereNull('parent_id')->get();
        $output = '<option value="">Please Select a Category *</option>';
        foreach ($datas as $data) {
            $output .= '<option value="'.$data->id.'">'.$data->title.'</option>';
        }
        return $output;
    }

    // ✅ Fetch Subcategories by Category
    public function subcategory($id)
    {
        $datas = Category::find($id)->child;
        $output = '<option value="">Please Select a SubCategory (if any)</option>';
        foreach ($datas as $data) {
            $output .= '<option value="'.$data->id.'">'.$data->title.'</option>';
        }
        return $output;
    }

    // ✅ Subcategory in Update Mode
    public function subcategoryUpdate($id, $y)
    {
        $datas = Category::find($id)->child;
        $post  = Post::find($y);
        $output = '<option value="">Please Select a SubCategory (if any)</option>';
        foreach ($datas as $data) {
            $msg = ($data->id == $post->subcategories_id) ? 'selected' : '';
            $output .= '<option value="'.$data->id.'" '.$msg.'>'.$data->title.'</option>';
        }
        return $output;
    }

    // ✅ Slug Generator
    public function slugCreate(Request $request)
    {
        $val = $request->title;
        return slug_create($val); // helper.php এর ফাংশন
    }

    // ✅ Store New Article
    public function store(Request $request)
    {
        $rules = [
            'language_id'   => 'required',
            'title'         => 'required',
            'slug'          => 'required|unique:posts',
            'image_big'     => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description'   => 'required',
            'category_id'   => 'required',
  'division_id'   => 'nullable',
'district_id'   => 'nullable',
'upazila_id'    => 'nullable',
            'gallery.*'     => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $data  = new Post();
        $input = $request->all();

        // ✅ Image upload
        if ($file = $request->file('image_big')) {
            $img = Image::make($file->getRealPath())->resize(780, 438);
            $thumbnail = time().Str::random(8).'.jpg';
            $img->save(base_path().'/../assets/images/post/'.$thumbnail);
            $input['image_big'] = $thumbnail;
        }

        $input['admin_id']   = auth()->guard('admin')->id();
        $input['is_pending'] = 0;
        $input['status']     = $request->draft == 1 ? 'draft' : 'true';
        $input['post_type']  = 'article';

        if ($date = $request->schedule_post_date) {
            $input['schedule_post_date'] = $date;
        }

        $data->fill($input)->save();

        // ✅ Save multiple gallery images
        if ($files = $request->file('gallery')) {
            foreach ($files as $file) {
                $gallery = new Gallery;
                $img = Image::make($file->getRealPath())->resize(780, 438);
                $thumbnail = time().Str::random(8).'.jpg';
                $img->save(base_path().'/../assets/images/galleries/'.$thumbnail);
                $gallery->photo = $thumbnail;
                $gallery->post_id = $data->id;
                $gallery->save();
            }
        }

        return response()->json('Article Added Successfully');
    }
	// ✅ Edit Article Page
public function edit($id)
{
    $post = Post::findOrFail($id);
    $languages = Language::orderBy('id', 'desc')->get();
    $divisions = Division::orderBy('name', 'asc')->get();

    // Category list (based on language)
    $categories = Category::whereNull('parent_id')
                    ->where('language_id', $post->language_id)
                    ->orderBy('id', 'asc')
                    ->get();

    // Subcategory list (based on selected category)
    $subcategories = Category::where('parent_id', $post->category_id)->get();

    return view('admin.article.edit', compact(
        'post',
        'languages',
        'divisions',
        'categories',
        'subcategories'
    ));
}


// ✅ Fetch Divisions by Language
public function getDivisionsByLanguage($language_id)
{
    $divisions = Division::where('language_id', $language_id)->orderBy('name', 'asc')->get();

    $output = '<option value="">Select Division</option>';
    foreach ($divisions as $division) {
        $output .= '<option value="'.$division->id.'">'.$division->name.'</option>';
    }

    return $output;
}


	
	
	
	
// ✅ Language On Update (Edit Page এ পূর্বের ক্যাটাগরি দেখানোর জন্য)
public function languageOnUpdate($id, $postId)
{
    $datas = Language::find($id)->categories()->whereNull('parent_id')->get();
    $post = Post::find($postId);

    $output = '<option value="">Please Select a Category *</option>';
    foreach ($datas as $data) {
        $selected = ($data->id == $post->category_id) ? 'selected' : '';
        $output .= '<option value="'.$data->id.'" '.$selected.'>'.$data->title.'</option>';
    }
    return $output;
}
    // ✅ Update Article
    public function update(Request $request, $id)
    {
        $rules = [
            'language_id'   => 'required',
            'title'         => 'required',
            'slug'          => 'required|unique:posts,slug,'.$id,
            'image_big'     => 'image|mimes:jpeg,png,jpg,gif,svg',
            'description'   => 'required',
            'category_id'   => 'required',
'division_id'   => 'nullable',
'district_id'   => 'nullable',
'upazila_id'    => 'nullable',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        $data  = Post::find($id);
        $input = $request->all();

        // ✅ Replace old image if new one uploaded
        if ($file = $request->file('image_big')) {
            $img = Image::make($file->getRealPath())->resize(780, 438);
            $thumbnail = time().Str::random(8).'.jpg';
            $img->save(base_path().'/../assets/images/post/'.$thumbnail);
            @unlink('assets/images/post/'.$data->image_big);
            $input['image_big'] = $thumbnail;
        }

        $input['status'] = $request->draft == 1 ? 'draft' : 'true';
        $input['post_type'] = 'article';

        if ($date = $request->schedule_post_date) {
            $input['schedule_post_date'] = $date;
        }

        $data->update($input);
        return response()->json('Data Updated Successfully');
    }

    // ✅ AJAX: District List by Division
    public function getDistricts($division_id)
    {
        $districts = District::where('division_id', $division_id)->get();
        $output = '<option value="">Select District</option>';
        foreach ($districts as $d) {
            $output .= '<option value="'.$d->id.'">'.$d->name.'</option>';
        }
        return $output;
    }

    // ✅ AJAX: Upazila List by District
    public function getUpazilas($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->get();
        $output = '<option value="">Select Upazila</option>';
        foreach ($upazilas as $u) {
            $output .= '<option value="'.$u->id.'">'.$u->name.'</option>';
        }
        return $output;
    }
}
