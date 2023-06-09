<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\LabCategory;
use App\Models\Labsubcategory;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Lab::all();
        return view('lab.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = LabCategory::all(); $subcats = Labsubcategory::all();
        return view('lab.create', compact('cats', 'subcats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:labs,name',
            'category_id' => 'required',
        ]);
        $input = $request->all();
        Lab::create($input);
        return redirect()->route('lab')->with('success', 'Lab created successfully');
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
        $lab = Lab::find($id); $cats = LabCategory::all(); $subcats = Labsubcategory::all();
        return view('lab.edit', compact('lab', 'cats', 'subcats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:labs,name,'.$id,
            'category_id' => 'required',
        ]);
        $input = $request->all();
        $lab = Lab::find($id);
        $lab->update($input);
        return redirect()->route('lab')->with('success', 'Lab updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lab::find($id)->delete();
        return redirect()->route('lab')->with('success', 'Lab deleted successfully');
    }
}
