<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\Patient;
use App\Models\PatientFile;
use App\Models\PatientLab;
use App\Models\PatientMedicine;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Exception;

class HelperController extends Controller
{
    public function createddl($type){
        $data = "";
        if($type == 'lab'){
            $data = DB::table('labs')->select('id', 'name')->get();
        }
        if($type == 'medicine'){
            $data = DB::table('medicines')->select('id', 'name')->get();
        }
        if($type == 'service'){
            $data = DB::table('services')->select('id', 'name')->get();
        }
        return response()->json($data);
    }

    public function getmedicines(){
        $medicines = PatientMedicine::whereDate('created_at', Carbon::today())->groupBy('file_id')->get();
        return view('patient-counselling.medicine', compact('medicines'));
    }

    public function getlabs(){
        $labs = PatientLab::whereDate('created_at', Carbon::today())->groupBy('file_id')->get();
        return view('patient-counselling.lab', compact('labs'));
    }

    public function getlabsforedit($id){
        $labs = PatientLab::where('file_id', $id)->get();
        $file = PatientFile::find($id);
        return view('patient-counselling.lab-result', compact('labs', 'file'));
    }

    public function getlabsupdate(Request $request, $id){
        $this->validate($request, [
            'lab_id' => 'present|array',
        ]);
        try{
            $data = [];
            foreach($request->lab_id as $key => $lab):
                $lab_old = PatientLab::find($request->row_id[$key]);
                $data [] = [
                    'patient_id' => $request->patient_id[$key],
                    'file_id' => $request->file_id[$key],
                    'lab_id' => $lab,
                    'notes' => $request->notes[$key],
                    'normal_range' => $request->normal_range[$key],
                    'result' => $request->result[$key],
                    'created_by' => $lab_old->getOriginal('created_by'),
                    'updated_by' => $request->user()->id,
                    'created_at' => $lab_old->getOriginal('created_at'),
                    'updated_at' => Carbon::now(),
                ];
            endforeach;
            PatientLab::where('file_id', $id)->delete();
            PatientLab::insert($data);
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }        
        return redirect()->route('getlabs')->with('success', 'Lab result updated successfully');
    }

    public function getservice(Request $request){
        $sid = $request->service;
        $service = Service::find($sid);
        return response()->json($service);
    }
}
