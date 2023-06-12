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
        $labs = PatientLab::leftJoin('labs as l', 'l.id', 'patient_labs.lab_id')->where('file_id', decrypt($id))->OrderBy('l.category_id')->get(); $file = PatientFile::find(decrypt($id));
        $cats = PatientLab::leftJoin('labs as l', 'l.id', 'patient_labs.lab_id')->leftJoin('lab_categories as c', 'c.id', 'l.category_id')->select('c.name', 'c.id')->where('file_id', decrypt($id))->groupBy('l.category_id')->OrderBy('l.category_id')->get();
        $pdf = PDF::loadView('/pdfs/patient-lab-bill', compact('file', 'labs', 'cats'));
        return $pdf->stream($file->id.'.pdf');
    }

}
