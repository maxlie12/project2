<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
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
        //select * from book join subject on  book.idSubject = subject.idSubject
        $listBook = Book::where('NameBook', 'like', "%$search%")->paginate(2);
        $listBook = Book::join('subject', 'book.idSubject', "=", 'subject.idSubject')
            // ->where('subject.nameSubject', $idSubject)
            ->where('NameBook', 'like', "%$search%")->paginate(2);
        return view('book.index', [
            'listBook' => $listBook,
            'search' => $search,
            'listSubject' => $listSubject,
            'idSubject' => $idSubject,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
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
        $amout = $request->get('amout');
        $idSubject = $request->get('idSubject');
        $book = new Book();
        $book->nameBook = $name;
        $book->amout = $amout;
        $book->idSubject = $idSubject;
        $book->save();
        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('idBook', $id)->first();
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('book.edit', [
            "book" => $book,
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
        $amout = $request->get('amout');
        $idSubject = $request->get('idSubject');
        $book = Book::find($id);
        $book->nameBook = $name;
        $book->amout = $amout;
        $book->idSubject = $idSubject;
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('idBook', $id)->delete();
        return redirect(route('book.index'));
    }
}
