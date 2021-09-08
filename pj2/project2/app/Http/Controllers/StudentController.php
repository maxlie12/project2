<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $search = $req->get('search');
        $idGrade = $req->get('idGrade');
        $liststudent = Student::join("grade", "student.idGrade", "=", "grade.idGrade")
            ->where("grade.idGrade", $idGrade)
            ->where('nameStudent', 'like', "%$search%")
            ->paginate(5);
        $listgrade = Grade::all();
        return view("student.index", [
            "ListStudent" => $liststudent,
            "search" => $search,
            "ListGrade" => $listgrade,
            "idGrade" => $idGrade
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liststudent = Student::all();
        $listgrade = Grade::all();
        return view("student.create", [
            "ListGrade" => $listgrade,
            "ListStudent" => $liststudent,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $date = $request->get('birthdate');
        $idGrade = $request->get('idGrade');
        $gender = $request->get('gender');
        $available = 0;
        $student = new Student();
        $student->nameStudent = $name;
        $student->idGrade = $idGrade;
        $student->birthday = $date;
        $student->gender = $gender;
        $student->available = $available;
        $student->save();
        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listgrade = Grade::all();
        $student = Student::find($id);
        return view('student.edit', [
            "student" => $student,
            "ListGrade" => $listgrade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $birthdate = $request->get('birthdate');
        $gender = $request->get('gender');
        $idGrade = $request->get('idGrade');
        $available = $request->get('available');
        $student = Student::find($id);
        $student->nameStudent = $name;
        $student->birthday = $birthdate;
        $student->gender = $gender;
        $student->idGrade = $idGrade;
        $student->available = $available;
        $student->save();
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
