<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Grade;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $idGrade = $request->get('idGrade');
        $listGrade = Grade::all();
        $listSubject = Subject::join('grade', 'subject.idGrade', '=', 'grade.idGrade')
            ->where('nameSubject', 'like', "%$search%")->paginate(2);
        // $listSubject = Subject::where('nameSubject', 'like', "%$search%")->paginate(2);
        return view('subject.index', [
            'listSubject' => $listSubject,
            'search' => $search,
            'listGrade' => $listGrade,
            'idGrade' => $idGrade,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listGrade = Grade::all();
        return view('subject.create', [
            'listGrade' => $listGrade,
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
        $idGrade = $request->get('idGrade');
        $subject = new Subject();
        $subject->nameSubject = $name;
        $subject->idGrade = $idGrade;
        $subject->save();
        return redirect(route('subject.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::where('idSubject', $id)->first();
        return $subject;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $idGrade = $request->get('idGrade');
        $listGrade = Grade::all();
        $subject = Subject::find($id);
        return view('subject.edit', [
            "subject" => $subject,
            'idGrade' => $idGrade,
            'listGrade' => $listGrade,
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
        $idGrade = $request->get('idGrade');
        $subject = Subject::find($id);
        $subject->nameSubject = $name;
        $subject->idGrade = $idGrade;
        $subject->save();
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subject::where('idSubject', $id)->delete();
        return redirect(route('subject.index'));
    }
}
