<?php

namespace App\Http\Controllers;

use App\Models\LabCategory;
use App\Models\Labsubcategory;
use Illuminate\Http\Request;

class LabsubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Labsubcategory::all();
        return view('lab.subcategory.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = LabCategory::all();
        return view('lab.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $input = $request->all();
        Labsubcategory::create($input);
        return redirect()->route('labsubcategory')->with('success', 'Lab subcategory created successfully');
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
        $categories = LabCategory::all(); $subcat = Labsubcategory::find($id);
        return view('lab.subcategory.edit', compact('categories', 'subcat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
        ]);
        $input = $request->all();
        $subcat = Labsubcategory::find($id);
        $subcat->update($input);
        return redirect()->route('labsubcategory')->with('success', 'Lab subcategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Labsubcategory::find($id)->delete();
        return redirect()->route('labsubcategory')->with('success', 'Lab subcategory deleted successfully');
    }
}
