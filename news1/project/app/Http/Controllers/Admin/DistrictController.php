<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;
use App\Models\Language;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with(['division', 'language'])->latest()->get();
        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        $languages = Language::all();
        $divisions = Division::all();
        return view('admin.district.create', compact('languages', 'divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language_id' => 'required',
            'division_id' => 'required',
            'name' => 'required|unique:districts,name',
        ]);

        District::create([
            'language_id' => $request->language_id,
            'division_id' => $request->division_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'District added successfully!');
    }

    public function edit($id)
    {
        $district = District::findOrFail($id);
        $languages = Language::all();
        $divisions = Division::all();
        return view('admin.district.edit', compact('district', 'languages', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $district = District::findOrFail($id);
        $request->validate([
            'language_id' => 'required',
            'division_id' => 'required',
            'name' => 'required|unique:districts,name,' . $id,
        ]);

        $district->update([
            'language_id' => $request->language_id,
            'division_id' => $request->division_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.district.index')->with('success', 'District updated!');
    }

    public function destroy($id)
    {
        District::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'District deleted!');
    }
}
