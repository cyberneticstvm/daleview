<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\PatientFile;
use Illuminate\Http\Request;

class PatientCounsellingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $file = PatientFile::find($id);
        $extras = Extra::all();
        return view('patient-counselling.create', compact('file', 'extras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
