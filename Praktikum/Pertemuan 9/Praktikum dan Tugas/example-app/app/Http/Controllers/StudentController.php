<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index(){
        $data['students'] = Student::all();
        return view('student', $data);
    }

    public function create(){
        $data['gender'] = ["L", "P"];
        $data['department'] = ["S1 RPL", "S1 Informatika", "S1 Sistem Informasi"];
        return view('studentTambah', $data);
    }

    public function store(){
        $student = new Student;
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->department = request('department');
        $student->address = request('address');
        $student->save();

        return redirect() -> back() -> with('pesan', "Berhasil input data");
    }

    public function edit($id){
        $data['student'] = Student::find($id);
        $data['gender'] = ["L", "P"];
        $data['department'] = ["S1 RPL", "S1 Informatika", "S1 Sistem Informasi"];
        return view('studentEdit', $data);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->department = request('department');
        $student->address = request('address');
        $student->save();

        return redirect() -> back() -> with('pesan', "Berhasil input data");
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->delete();

        return redirect() -> back() -> with('pesan', "Berhasil hapus data");
    }
}
