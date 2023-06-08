<?php

namespace App\Http\Controllers;

use App\Models\LabCategory;
use App\Models\PatientFile;
use App\Models\PatientLab;
use App\Models\PatientMedicine;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function patientbill($id){
        $file = PatientFile::find($id);
        $pdf = PDF::loadView('/pdfs/patient-bill', compact('file'));
        return $pdf->stream($file->id.'.pdf');
    }

    public function medprescription($id){
        $file = PatientFile::find(decrypt($id)); $medicines = PatientMedicine::where('file_id', decrypt($id))->get();
        $pdf = PDF::loadView('/pdfs/medprescription', compact('file', 'medicines'));
        return $pdf->stream($file->id.'.pdf');
    }

    public function patientlabbill($id){
        $labs = PatientLab::where('file_id', decrypt($id))->get(); $file = PatientFile::find(decrypt($id));
        $cats = LabCategory::all();
        $pdf = PDF::loadView('/pdfs/patient-lab-bill', compact('file', 'labs', 'cats'));
        return $pdf->stream($file->id.'.pdf');
    }

}
