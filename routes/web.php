<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TrainingController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::resource('employees', EmployeeController::class);
Route::get('trainings/create/{employeeId}', [TrainingController::class, 'create'])->name('trainings.create');
Route::post('trainings', [TrainingController::class, 'store'])->name('trainings.store');
Route::delete('trainings/{training}', [TrainingController::class, 'destroy'])->name('trainings.destroy');
