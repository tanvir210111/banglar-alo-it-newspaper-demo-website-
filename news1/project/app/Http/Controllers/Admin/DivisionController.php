<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Language;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::with('language')->latest()->get();
        return view('admin.division.index', compact('divisions'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.division.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'language_id' => 'required',
            'name' => 'required|unique:divisions,name',
        ]);

        Division::create([
            'language_id' => $request->language_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->back()->with('success', 'Division added successfully!');
    }

    public function edit($id)
    {
        $division = Division::findOrFail($id);
        $languages = Language::all();
        return view('admin.division.edit', compact('division', 'languages'));
    }

    public function update(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        $request->validate([
            'language_id' => 'required',
            'name' => 'required|unique:divisions,name,' . $id,
        ]);

        $division->update([
            'language_id' => $request->language_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.division.index')->with('success', 'Division updated!');
    }

    public function destroy($id)
    {
        Division::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Division deleted!');
    }
}
