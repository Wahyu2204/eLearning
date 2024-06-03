<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //
    public function index(){

        $coursess = Courses::all();

        return view('admin.contents.courses.index', [
            'coursess' => $coursess
        ]);
    }

    // method untuk menampilkan from tambah courses
    public function create() {
        return view('admin.contents.courses.create');
    }

    // method untuk menyimpan data courses
    public function store(Request $request){
        // validasi data terima
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        // simpan ke databases
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // arahkan ke halaman daftar student index
        return redirect('/admin/courses')->with('pesan', 'berhasil menambahkan data.');
    }

    // method untuk menampilkan halaman edit
    public function edit($id){
        // cari student berdasarkan id
        $courses = Courses::find($id);

        // kirim student ke view edit
        return view('admin.contents.courses.edit', [
            'courses' => $courses,
        ]);
    }

    // method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $courses = Courses::find($id);

        // validasi request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required'
        ]);

        // simpan perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // arahkan ke halaman daftar student index
        return redirect('/admin/courses')->with('pesan', 'berhasil mengedit data.');
    }

    // method untuk menghapus data
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Courses::find($id);

        // hapus student
        $student->delete();

        // arahkan ke halaman daftar student index
        return redirect('/admin/courses')->with('pesan', 'berhasil menghapus data.');
    }
}
