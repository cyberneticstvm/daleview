<?php

namespace App\Http\Controllers;

use App\Models\PatientFile;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function patientbill($id){
        $file = PatientFile::find($id);
        $pdf = PDF::loadView('/pdfs/patient-bill', compact('file'));
        return $pdf->stream($file->id.'.pdf');
    }
}
