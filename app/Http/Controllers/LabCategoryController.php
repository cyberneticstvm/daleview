<?php

namespace App\Http\Controllers;

use App\Models\LabCategory;
use Illuminate\Http\Request;

class LabCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = LabCategory::all();
        return view('lab.category.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lab.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        LabCategory::create($input);
        return redirect()->route('labcategory')->with('success', 'Lab category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lab = LabCategory::find($id);
        return view('lab.category.edit', compact('lab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $input = $request->all();
        $lab = LabCategory::find($id);
        $lab->update($input);
        return redirect()->route('labcategory')->with('success', 'Lab category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LabCategory::find($id)->delete();
        return redirect()->route('labcategory')->with('success', 'Lab category deleted successfully');
    }
}
