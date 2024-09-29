<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController; 
use App\Http\Controllers\StudentController; 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('groups', GroupController::class);
Route::resource('groups.students', StudentController::class)->shallow();

Route::delete('/groups/{group}/students/{student}', [StudentController::class, 'destroy'])->name('groups.students.destroy');
Route::get('/groups/{group}/students/{student}', [StudentController::class, 'show'])->name('groups.students.show');
Route::get('/groups/{group}/students/{student}/edit', [StudentController::class, 'edit'])->name('groups.students.edit');
Route::put('groups/{group}/students/{student}', [StudentController::class, 'update'])->name('groups.students.update');