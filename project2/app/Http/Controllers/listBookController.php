<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bill;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class listBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $idSubject = $request->get('idSubject');
        $listSubject = Subject::all();
        $listCourse = Course::all();
        $listGrade = Grade::all();
        $listBill = Bill::all();
        //select * from book join subject on  book.idSubject = subject.idSubject
        // $listBook = Book::join('subject', 'book.idSubject', "=", 'subject.idSubject')
        //     ->where('NameBook', 'like', "%$search%")->paginate(2);
        $listBook =  DB::table('book')
            ->join('grade', 'book.idBook', '=', 'grade.idGrade')
            ->join('course', 'book.idBook', '=', 'course.idCourse')
            ->join('subject', 'book.idBook', '=', 'subject.idSubject')
            ->join('bill', 'book.idBook', '=', 'bill.idBill')
            ->select('book.*', 'grade.nameGrade', 'course.nameCourse', 'subject.nameSubject', 'bill.time')
            ->where('NameGrade', 'like', "%$search%")->paginate(2);
        return view('list.index', [
            'listBook' => $listBook,
            'search' => $search,
            'listSubject' => $listSubject,
            'idSubject' => $idSubject,
            'listCourse' => $listCourse,
            'listGrade' => $listGrade,
            'listBill' => $listBill,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return Book::all();
        // return Bill::all();
        // return Course::all();
        // return Subject::all();
        // return Grade::all();
        // return view('list.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
