<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $search = $req->get('search');
        $idCourse = $req->get('idCourse');
        $listgrade = Grade::join("course", "grade.idCourse", "=", "course.idCourse")
            ->where("course.idCourse", $idCourse)
            ->where('nameGrade', 'like', "%$search%")
            ->paginate(5);
        $listcourse = Course::all();
        return view("grade.index", [
            "ListGrade" => $listgrade,
            "search" => $search,
            "ListCourse" => $listcourse,
            "idCourse" => $idCourse
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listcourse = Course::all();
        return view("grade.create", [
            "ListCourse" => $listcourse,
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
        $idCourse = $request->get('idCourse');
        $grade = new Grade();
        $grade->nameGrade = $name;
        $grade->idCourse = $idCourse;
        $grade->save();
        return redirect(route('grade.index'));
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
    public function edit(Request $request, $id)
    {
        $idCourse = $request->get('idCourse');
        $listcourse = Course::all();
        $grade = Grade::find($id);
        return view('grade.edit', [
            "grade" => $grade,
            "ListCourse" => $listcourse,
            "idCourse" => $idCourse
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
        $name = $request->get('name-grade');
        $idCourse = $request->get('idCourse');
        $grade = Grade::find($id);
        $grade->nameGrade = $name;
        $grade->idCourse = $idCourse;
        $grade->save();
        return redirect(route('grade.index'));
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
