<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk menampilkan halaman student
    public function index(){
        // mendapatkan data student dari databases
        $students = Student::all();

        // panggil view dan kirim data ke view
        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }

    // method untuk menampilkan from tambah student
    public function create() {
        return view('admin.contents.student.create');
    }

    // method untuk menyimpan data student
    public function store(Request $request){
        // validasi data terima
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        // simpan ke databases
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // arahkan ke halaman daftar student index
        return redirect('/admin/student')->with('pesan', 'berhasil menambahkan data.');
    }

    // method untuk menampilkan halaman edit
    public function edit($id){
        // cari student berdasarkan id
        $student = Student::find($id);

        // kirim student ke view edit
        return view('admin.contents.student.edit', [
            'student' => $student,
        ]);
    }

    // method untuk menyimpan hasil update
    public function update($id, Request $request){
        // cari data student berdasarkan id
        $student = Student::find($id);

        // validasi request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required'
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
        ]);

        // arahkan ke halaman daftar student index
        return redirect('/admin/student')->with('pesan', 'berhasil mengedit data.');
    }

    // method untuk menghapus data
    public function destroy($id){
        // cari data student berdasarkan id
        $student = Student::find($id);

        // hapus student
        $student->delete();

        // arahkan ke halaman daftar student index
        return redirect('/admin/student')->with('pesan', 'berhasil mengedit data.');
    }
}
