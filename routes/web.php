<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientFileController;

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

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/dash', [UserController::class, 'dash'])->name('dash');
});

Route::group(['middleware' => ['web', 'auth', 'admin']], function(){
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.save');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::group(['middleware' => ['web', 'auth']], function(){
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

    Route::get('/patient/counselling', [PatientFileController::class, 'index'])->name('patient.counselling');
    Route::get('/patient/counselling/create/{id}', [PatientFileController::class, 'create'])->name('patient.counselling.create');
    Route::post('/patient/counselling/create/{id}', [PatientFileController::class, 'store'])->name('patient.counselling.save');
    Route::get('/patient/counselling/edit/{id}', [PatientFileController::class, 'edit'])->name('patient.counselling.edit');
    Route::put('/patient/counselling/edit/{id}', [PatientFileController::class, 'update'])->name('patient.counselling.update');
    Route::delete('/patient/counselling/delete/{id}', [PatientFileController::class, 'destroy'])->name('patient.counselling.delete');
});
