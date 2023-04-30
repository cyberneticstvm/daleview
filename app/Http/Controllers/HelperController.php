<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\PatientLab;
use App\Models\PatientMedicine;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

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
        $medicines = PatientMedicine::whereDate('created_at', Carbon::today())->get();
        return view('patient-counselling.medicine', compact('medicines'));
    }

    public function getlabs(){
        $labs = PatientLab::whereDate('created_at', Carbon::today())->get();
        return view('patient-counselling.lab', compact('labs'));
    }

    public function getservice(Request $request){
        $sid = $request->service;
        $service = Service::find($sid);
        return response()->json($service);
    }
}
