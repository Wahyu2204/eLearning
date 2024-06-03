<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',function () {
  return view('Welcome');
});

Route::get('admin/dashboard',[DashboardController::class,'index']);

// Route untuk enampilkan student
Route::get('admin/student', [StudentController::class,'index']);

// ROute untuk menampilkan courses
Route::get('admin/courses', [CoursesController::class,'index']);

// Route untuk mrnmpilkan from tambahan student
Route::get('admin/student/create',[StudentController::class, 'create']);

// Route untuk mengirim data from tambah student
Route::post('admin/student/create',[StudentController::class, 'store']);

// Route untuk menampilkan halaman edit student
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

// Route untuk menyimpan hasil update student
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// Route untuk menghapus stundent
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);