<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;
use App\Models\PatientFile;
use App\Models\PatientAdmissionReason;
use App\Models\User;
use App\Models\Extra;
use Illuminate\Http\Request;
use DB;

class PatientFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $counsellors;

    public function __construct()
    {
        $this->counsellors = User::where('role', 'Intake Counsellor')->where('status', 1)->get();
    }

    public function index()
    {
        $records = PatientFile::whereDate('created_at', Carbon::today())->orderByDesc('id')->get();
        return view('patient-files.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $patient = Patient::find($id);
        $counsellors = $this->counsellors;
        $extras = Extra::all();
        return view('patient-files.create', compact('patient', 'counsellors', 'extras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'counsellor_id' => 'required',
            'reasons' => 'present|array',
            'referred_by' => 'required',
            'referral_person_mobile' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        try{
            DB::transaction(function() use ($input, $request) {   
                $file = PatientFile::create($input);             
                foreach($request->reasons as $key => $reason):
                    $data [] = [
                        'file_id' => $file->id,
                        'reason' => $reason,
                    ];
                endforeach;
                PatientAdmissionReason::insert($data);
            });
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Failed! '.$e->getMessage())->withInput($request->all());
        }        
        return redirect()->route('patient.file')->with('success', 'File Created Successfully!');  
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
        $file = PatientFile::find($id); $counsellors = $this->counsellors;
        $extras = Extra::all();
        return view('patient-files.edit', compact('file', 'counsellors', 'extras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'counsellor_id' => 'required',
            'reasons' => 'present|array',
            'referred_by' => 'required',
            'referral_person_mobile' => 'required',
        ]);
        $input = $request->all();        
        $input['updated_by'] = $request->user()->id;
        try{
            DB::transaction(function() use ($input, $request, $id) {
                $file = PatientFile::find($id);
                $file->update($input);
                PatientAdmissionReason::where('file_id', $id)->delete();
                foreach($request->reasons as $key => $reason):
                    $data [] = [
                        'file_id' => $id,
                        'reason' => $reason,
                    ];
                endforeach;
                PatientAdmissionReason::insert($data);
            });
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Failed! '.$e->getMessage())->withInput($request->all());
        }
        return redirect()->route('patient.file')->with('success', 'File Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PatientFile::find($id)->delete();
        return redirect()->route('patient.file')->with('success', 'File Deleted Successfully!');
    }
}
