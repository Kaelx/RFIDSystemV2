<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RfidScanController;
use App\Http\Controllers\VendorController;


use App\Models\Department;
use App\Models\JobPosition;
use App\Models\Program;
use App\Models\RfidScan;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('vendors', VendorController::class);


    Route::get('/categories', function () {
        $departments = Department::all();
        $programs = Program::all();
        $jobPositions = JobPosition::all();

        return view('categories.index', compact('departments', 'programs', 'jobPositions'));
    });

    Route::resource('departments', DepartmentController::class)->except('index');
    Route::resource('programs', ProgramController::class)->except('index');
    Route::resource('positions', JobPositionController::class)->except('index');

    Route::resource('rfid', RfidScanController::class);

    Route::post('/rfid', [RfidScanController::class, 'rfid'])->name('rfid.scan');
});

require __DIR__ . '/auth.php';
