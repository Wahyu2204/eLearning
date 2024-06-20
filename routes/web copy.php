<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Courses;

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

// Route untuk menampilkan from tambahan courses
Route::get('admin/courses/create', [CoursesController::class, 'create']);

// Route untuk mengirim data from tambah courses
Route::post('admin/courses/create', [CoursesController::class, 'store']);

// Route untuk menampilkan halaman edit courses
Route::get('admin/courses/edit/{id}', [CoursesController::class, 'edit'])->name('courses.edit');

// Route untuk menyimpan hasil update courses
Route::put('admin/courses/update/{id}', [CoursesController::class, 'update']);

// Route untuk menghapus ocurses
Route::delete('admin/courses/delete/{id}', [CoursesController::class, 'destroy']);