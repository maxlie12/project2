<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentUnregisteredController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listSubject = Subject::all();
        $listCourse = Course::all();
        $listBill = Bill::all();
        $listStudent =  DB::table('student')
            ->join('grade', 'student.idStudent', '=', 'grade.idGrade')
            ->join('course', 'student.idStudent', '=', 'course.idCourse')
            ->join('subject', 'student.idStudent', '=', 'subject.idSubject')
            ->select('student.*', 'grade.nameGrade', 'course.nameCourse', 'subject.nameSubject')
            ->where('nameStudent', 'like', "%$search%")->paginate(2);
        return view('listStudentUnregistered.index', [
            'listStudent' => $listStudent,
            'search' => $search,
            'listSubject' => $listSubject,
            'listCourse' => $listCourse,
            'listBill' => $listBill,
        ]);
    }
}
