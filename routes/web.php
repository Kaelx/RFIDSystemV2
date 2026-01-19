<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RfidScanController;
use App\Http\Controllers\SellerController;


use App\Models\Department;
use App\Models\JobPosition;
use App\Models\Program;
use App\Models\RfidScan;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::resource('student', StudentController::class);
    Route::get('/student/{student}/record', [StudentController::class, 'showRecord'])->name('student.record');


    Route::resource('employee', EmployeeController::class);
    Route::get('/employee/{employee}/record', [EmployeeController::class, 'showRecord'])->name('employee.record');



    Route::resource('seller', SellerController::class);
    Route::get('/seller/{seller}/record', [SellerController::class, 'showRecord'])->name('seller.record');


    Route::get('/category', function () {
        $departments = Department::all();
        $programs = Program::all();
        $jobPositions = JobPosition::all();

        return view('category.index', compact('departments', 'programs', 'jobPositions'));
    });

    Route::resource('department', DepartmentController::class)->except('index');
    Route::resource('program', ProgramController::class)->except('index');
    Route::resource('position', JobPositionController::class)->except('index');

    Route::get('/rfid', [RfidScanController::class, 'index'])->name('rfid.index');
    Route::get('/rfid/record', [RfidScanController::class, 'rfidRecord'])->name('rfid.records');
});

require __DIR__ . '/auth.php';
