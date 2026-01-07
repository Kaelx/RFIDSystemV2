<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\VendorController;


use App\Models\Department;
use App\Models\JobPosition;
use App\Models\Program;

Route::get('/', function () {
    return view('welcome');
});

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
});

require __DIR__ . '/auth.php';
