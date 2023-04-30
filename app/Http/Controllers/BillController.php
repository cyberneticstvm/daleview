<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\PatientFile;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::selectRaw("file_id, SUM(total) AS total")->groupBy('file_id')->get();
        return view('patient-bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function fetch(Request $request)
    {
        $this->validate($request, [
            'file_number' => 'required',
        ]);
        $file = PatientFile::find($request->file_number);
        if($file):
            return view('patient-bills.create', compact('file'));
            //return redirect()->route('bill.create')->with(['file' => $file]);
        else:
            return redirect()->back()->with('error', 'No records found')->withInput($request->all());
        endif;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'services' => 'present|array',
        ]);
        $data = [];
        foreach($request->services as $key => $service):
            if($service):
                $data [] = [
                    'file_id' => $request->file_number,
                    'service_id' => $service,
                    'qty' => $request->qty[$key],
                    'fee' => $request->fee[$key],
                    'total' => $request->qty[$key]*$request->fee[$key],
                    'notes' => $request->notes[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            endif;
        endforeach;
        Bill::insert($data);
        return redirect()->route('bill')->with('success', 'Bill updated successfully!');
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
        $file = PatientFile::find($id);
        $bills = Bill::where('file_id', $id)->get();
        $services = Service::all();
        return view('patient-bills.edit', compact('bills', 'file', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'services' => 'present|array',
        ]);
        $data = [];
        foreach($request->services as $key => $service):
            if($service):
                $data [] = [
                    'file_id' => $request->file_number,
                    'service_id' => $service,
                    'qty' => $request->qty[$key],
                    'fee' => $request->fee[$key],
                    'total' => $request->qty[$key]*$request->fee[$key],
                    'notes' => $request->notes[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            endif;
        endforeach;
        Bill::where('file_id', $id)->delete();
        Bill::insert($data);
        return redirect()->route('bill')->with('success', 'Bill updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bill::where('file_id', $id)->delete();
        return redirect()->route('bill')->with('success', 'Bill deleted successfully!');
    }
}
