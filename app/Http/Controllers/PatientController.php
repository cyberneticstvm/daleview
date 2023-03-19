<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Extra;
use App\Models\Settings;
use App\Models\Patient;
use App\Models\PatientAdmissionReason;
use BaconQrCode\Renderer\Path\Path;
use Illuminate\Http\Request;
use DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $settings;
    public function __construct()
    {
        $this->settings = Settings::find(1);
    }
    public function index()
    {
        $patients = Patient::orderByDesc('id')->get();
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $extras = Extra::all();
        return view('patient.create', compact('extras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|digits:10',
            'dob' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'education' => 'required',
            'employment' => 'required',
            'language' => 'required',
            'id_proof' => 'required',
            'id_proof_number' => 'required',            
            'registration_date' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        $input['registration_fee'] = ($request->registration_fee > 0) ? $this->settings->registration_fee : 0;
        if($request->patient_photo):
            $doc = $request->file('patient_photo');
            $newname = time().$doc->getClientOriginalName();
            $fname = 'patient-photos/'.$newname;
            Storage::disk('public')->putFileAs($fname, $doc, '');
            $input['patient_photo'] = $newname;
        endif;
        $patient = Patient::create($input);        
        return redirect()->route('patient')->with('success', 'Patient Created Successfully!');        
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
        $extras = Extra::all();
        $patient = Patient::find($id);
        return view('patient.edit', compact('extras', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|digits:10',
            'dob' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'education' => 'required',
            'employment' => 'required',
            'language' => 'required',
            'id_proof' => 'required',
            'id_proof_number' => 'required',         
            'registration_date' => 'required',
        ]);
        $input = $request->all();
        $input['updated_by'] = $request->user()->id;
        $input['registration_fee'] = ($request->registration_fee > 0) ? $this->settings->registration_fee : 0;
        if($request->patient_photo):
            $doc = $request->file('patient_photo');
            $newname = time().$doc->getClientOriginalName();
            $fname = 'patient-photos/'.$newname;
            Storage::disk('public')->putFileAs($fname, $doc, '');
            $input['patient_photo'] = $newname;
        endif;
        $patient = Patient::find($id);
        $patient->update($input);        
        return redirect()->route('patient')->with('success', 'Patient Updated Successfully!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Patient::find($id)->delete();
        return redirect()->route('patient')->with('success', 'Patient Deleted Successfully!');
    }
}
