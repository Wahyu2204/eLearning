<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Courses;

// Route::get('admin/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
