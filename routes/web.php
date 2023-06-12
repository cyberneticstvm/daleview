<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\LabCategoryController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LabsubcategoryController;
use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientFileController;
use App\Http\Controllers\PatientCounsellingController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['web', 'auth', 'admin']], function(){

    Route::get('/helper/getservice', [HelperController::class, 'getservice'])->name('getservice');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.save');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

    Route::get('/lab', [LabController::class, 'index'])->name('lab');
    Route::get('/lab/create', [LabController::class, 'create'])->name('lab.create');
    Route::post('/lab/create', [LabController::class, 'store'])->name('lab.save');
    Route::get('/lab/edit/{id}', [LabController::class, 'edit'])->name('lab.edit');
    Route::put('/lab/edit/{id}', [LabController::class, 'update'])->name('lab.update');
    Route::delete('/lab/delete/{id}', [LabController::class, 'destroy'])->name('lab.delete');

    Route::get('/labcategory', [LabCategoryController::class, 'index'])->name('labcategory');
    Route::get('/labcategory/create', [LabCategoryController::class, 'create'])->name('labcategory.create');
    Route::post('/labcategory/create', [LabCategoryController::class, 'store'])->name('labcategory.save');
    Route::get('/labcategory/edit/{id}', [LabCategoryController::class, 'edit'])->name('labcategory.edit');
    Route::put('/labcategory/edit/{id}', [LabCategoryController::class, 'update'])->name('labcategory.update');
    Route::delete('/labcategory/delete/{id}', [LabCategoryController::class, 'destroy'])->name('labcategory.delete');

    Route::get('/labsubcategory', [LabsubcategoryController::class, 'index'])->name('labsubcategory');
    Route::get('/labsubcategory/create', [LabsubcategoryController::class, 'create'])->name('labsubcategory.create');
    Route::post('/labsubcategory/create', [LabsubcategoryController::class, 'store'])->name('labsubcategory.save');
    Route::get('/labsubcategory/edit/{id}', [LabsubcategoryController::class, 'edit'])->name('labsubcategory.edit');
    Route::put('/labsubcategory/edit/{id}', [LabsubcategoryController::class, 'update'])->name('labsubcategory.update');
    Route::delete('/labsubcategory/delete/{id}', [LabsubcategoryController::class, 'destroy'])->name('labsubcategory.delete');

    Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine');
    Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');
    Route::post('/medicine/create', [MedicineController::class, 'store'])->name('medicine.save');
    Route::get('/medicine/edit/{id}', [MedicineController::class, 'edit'])->name('medicine.edit');
    Route::put('/medicine/edit/{id}', [MedicineController::class, 'update'])->name('medicine.update');
    Route::delete('/medicine/delete/{id}', [MedicineController::class, 'destroy'])->name('medicine.delete');

    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.save');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/edit/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('service.delete');

    Route::get('/bill', [BillController::class, 'index'])->name('bill');
    Route::post('/bill', [BillController::class, 'fetch'])->name('bill.fetch');
    Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create');
    Route::post('/bill/create', [BillController::class, 'store'])->name('bill.save');
    Route::get('/bill/edit/{id}', [BillController::class, 'edit'])->name('bill.edit');
    Route::put('/bill/edit/{id}', [BillController::class, 'update'])->name('bill.update');
    Route::delete('/bill/delete/{id}', [BillController::class, 'destroy'])->name('bill.delete');
});

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/dash', [UserController::class, 'dash'])->name('dash');

    Route::get('/patient', [PatientController::class, 'index'])->name('patient');
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient/create', [PatientController::class, 'store'])->name('patient.save');
    Route::get('/patient/edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patient/edit/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/patient/delete/{id}', [PatientController::class, 'destroy'])->name('patient.delete');

    Route::get('/patient/file', [PatientFileController::class, 'index'])->name('patient.file');
    Route::get('/patient/file/create/{id}', [PatientFileController::class, 'create'])->name('patient.file.create');
    Route::post('/patient/file/create/{id}', [PatientFileController::class, 'store'])->name('patient.file.save');
    Route::get('/patient/file/edit/{id}', [PatientFileController::class, 'edit'])->name('patient.file.edit');
    Route::put('/patient/file/edit/{id}', [PatientFileController::class, 'update'])->name('patient.file.update');
    Route::delete('/patient/file/delete/{id}', [PatientFileController::class, 'destroy'])->name('patient.file.delete');

    Route::get('/patient/counselling/{id}', [PatientCounsellingController::class, 'index'])->name('patient.counselling');
    Route::post('/patient/counselling/sud/{id}', [PatientCounsellingController::class, 'updatesud'])->name('patient.counselling.sud.update');
    Route::post('/patient/counselling/mhp/{id}', [PatientCounsellingController::class, 'updatemhp'])->name('patient.counselling.mhp.update');
    Route::post('/patient/counselling/couns/{id}', [PatientCounsellingController::class, 'updatecounselling'])->name('patient.counselling.couns.update');
    Route::post('/patient/counselling/smoking/{id}', [PatientCounsellingController::class, 'updatesmokingcessation'])->name('patient.counselling.smoking.update');
    Route::post('/patient/counselling/doctor/{id}', [PatientCounsellingController::class, 'updatedoctorcomments'])->name('patient.counselling.doctor.update');
    Route::post('/patient/counselling/lab/{id}', [PatientCounsellingController::class, 'updatelab'])->name('patient.counselling.lab.update');
    Route::post('/patient/counselling/medicine/{id}', [PatientCounsellingController::class, 'updatemedicine'])->name('patient.counselling.medicine.update');

    Route::get('/pharmacy/register', [HelperController::class, 'getmedicines'])->name('getmedicines');
    Route::get('/lab/register', [HelperController::class, 'getlabs'])->name('getlabs');
    Route::get('/lab/register/edit/{id}', [HelperController::class, 'getlabsforedit'])->name('getlabs.edit');
    Route::put('/lab/register/edit/{id}', [HelperController::class, 'getlabsupdate'])->name('getlabs.update');

    Route::get('/helper/createddl/{type}', [HelperController::class, 'createddl'])->name('createddl');

    Route::get('/patient/file/bill/{id}', [PdfController::class, 'patientbill'])->name('pdf.patientbill');
    Route::get('/patient/medicine/prescription/{id}', [PdfController::class, 'medprescription'])->name('pdf.medprescription');
    Route::get('/patient/lab/bill/{id}', [PdfController::class, 'patientlabbill'])->name('pdf.patientlabbill');
    
});
