<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Language;
use Illuminate\Support\Str;

class UpazilaController extends Controller
{
    public function index()
    {
        $upazilas = Upazila::with(['district', 'language'])->latest()->get();
        return view('admin.upazila.index', compact('upazilas'));
    }

    public function create()
    {
        $languages = Language::all();
        $districts = District::all();
        return view('admin.upazila.create', compact('languages', 'districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language_id' => 'required',
            'district_id' => 'required',
            'name' => 'required|unique:upazilas,name',
        ]);

        Upazila::create([
            'language_id' => $request->language_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Upazila added successfully!');
    }

    public function edit($id)
    {
        $upazila = Upazila::findOrFail($id);
        $languages = Language::all();
        $districts = District::all();
        return view('admin.upazila.edit', compact('upazila', 'languages', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $upazila = Upazila::findOrFail($id);
        $request->validate([
            'language_id' => 'required',
            'district_id' => 'required',
            'name' => 'required|unique:upazilas,name,' . $id,
        ]);

        $upazila->update([
            'language_id' => $request->language_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.upazila.index')->with('success', 'Upazila updated!');
    }

    public function destroy($id)
    {
        Upazila::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Upazila deleted!');
    }
}
