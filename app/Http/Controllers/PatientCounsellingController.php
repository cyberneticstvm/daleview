<?php

namespace App\Http\Controllers;

use App\Models\Counselling;
use App\Models\DoctorComment;
use App\Models\Extra;
use App\Models\Mhp;
use App\Models\PatientFile;
use App\Models\PatientLab;
use App\Models\PatientMedicine;
use App\Models\SmokingCessation;
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
        $mhp = Mhp::where('patient_id', $file->patient_id)->first();
        $sc = SmokingCessation::where('patient_id', $file->patient_id)->first();
        $counselling = Counselling::where('patient_id', $file->patient_id)->first();
        $doc_comments = DoctorComment::where('patient_id', $file->patient_id)->get();
        $labs = PatientLab::where('patient_id', $file->patient_id)->orderByDesc('created_at')->get();
        $medicines = PatientMedicine::where('patient_id', $file->patient_id)->orderByDesc('created_at')->get();
        return view('patient-counselling.create', compact('file', 'extras', 'sud', 'mhp', 'counselling', 'sc', 'doc_comments', 'labs', 'medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updatesud(Request $request, $id)
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

    public function updatemhp(Request $request, $id){
        $this->validate($request, [
            'patient_id' => 'required',
        ]);
        $input = $request->except(array('_token', 'file_id'));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        try{
            Mhp::upsert($input, 'patient_id');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Record updated successfully');
    }

    public function updatecounselling(Request $request, $id){
        $this->validate($request, [
            'patient_id' => 'required',
        ]);
        $input = $request->except(array('_token', 'file_id'));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        try{
            Counselling::upsert($input, 'patient_id');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Record updated successfully');
    }

    public function updatesmokingcessation(Request $request, $id){
        $this->validate($request, [
            'patient_id' => 'required',
        ]);
        $input = $request->except(array('_token', 'file_id'));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        try{
            SmokingCessation::upsert($input, 'patient_id');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Record updated successfully');
    }

    public function updatedoctorcomments(Request $request){
        $this->validate($request, [
            'comments' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = $request->user()->id;
        DoctorComment::create($input);
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Comments updated successfully');
    }

    public function updatelab(Request $request){
        $this->validate($request, [
            'labs' => 'present|array',
        ]);
        $data = [];
        foreach($request->labs as $key => $lab):
            $data [] = [
                'patient_id' => $request->patient_id,
                'file_id' => $request->patient_id,
                'lab_id' => $lab,
                'notes' => $request->notes[$key],
                'created_by' => $request->user()->id,
                'updated_by' => $request->user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        endforeach;
        PatientLab::insert($data);
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Lab updated successfully');
    }

    public function updatemedicine(Request $request){
        $this->validate($request, [
            'medicines' => 'present|array',
        ]);
        $data = [];
        foreach($request->medicines as $key => $med):
            $data [] = [
                'patient_id' => $request->patient_id,
                'file_id' => $request->patient_id,
                'medicine_id' => $med,
                'qty' => 0,
                'batch_number' => NULL,
                'dosage' => $request->dosage[$key],
                'notes' => $request->notes[$key],
                'created_by' => $request->user()->id,
                'updated_by' => $request->user()->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        endforeach;
        PatientMedicine::insert($data);
        return redirect()->route('patient.counselling', $request->file_id)->with('success', 'Medicine updated successfully');
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
