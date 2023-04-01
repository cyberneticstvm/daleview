<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\PatientFile;
use App\Models\Substance;
use App\Models\Sud;
use Carbon\Carbon;
use Exception;
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
        $sud = Sud::where('patient_id', $file->patient_id)->first();
        return view('patient-counselling.create', compact('file', 'extras', 'sud'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updatesud(Request $request)
    {
        $this->validate($request, [
            'patient_id' => 'required',
        ]);
        $input = $request->except(array('_token', 'type', 'qty', 'frequency', 'duration', 'file_id'));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;   
        try{
            Sud::upsert($input, 'patient_id');
            $data = [];
            foreach($request->type as $key => $value):
                $data [] = [
                    'patient_id' => $request->patient_id,
                    'type' => $value,
                    'qty' => $request->qty[$key],
                    'frequency' => $request->frequency[$key],
                    'duration' => $request->duration[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            endforeach;
            Substance::where('patient_id', $request->patient_id)->delete();
            Substance::insert($data);
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Record updated successfully');
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
