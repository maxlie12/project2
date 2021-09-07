<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\Student;
use App\Models\Book;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get("search");
        $listStudent = Student::all();
        $listBook = Book::all();
        // $student = $request->get('student');
        // $listBill = Bill::where('idBill', 'like', "%$search%")->paginate(2);
        $listBill = DB::table('bill')
            ->join("student", "bill.idStudent", "=", "student.idStudent")
            ->join("book", "bill.idBook", "=", "book.idBook")
            ->select('bill.*', 'student.*', 'book.*')
            ->where("idBill", "like", "%$search%")->paginate(5);

        // $listBill = Bill::join("student", "bill.idStudent", "=", "student.idStudent")
        // ->where('student.idStudent', $student)
        return view('bill.index', [
            "listBill" => $listBill,
            "search" => $search,
            "listStudent" => $listStudent,
            "listBook" => $listBook,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBill = Bill::all();
        $listStudent = Student::all();
        $listBook = Book::all();
        return view("bill.create", [
            "listStudent" => $listStudent,
            "listBill" => $listBill,
            "listBook" => $listBook,
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
        $time = $request->get('time');
        $idStudent = $request->get('idStudent');
        $idBook = $request->get('idBook');
        $status = $request->get('status');
        $bill = new Bill();
        $bill->time = $time;
        $bill->idStudent = $idStudent;
        $bill->idBook = $idBook;
        $bill->status = $status;
        $bill->save();
        return redirect(route('bill.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::find($id);
        $listStudent = Student::all();
        $listBook = Book::all();
        return view('bill.edit', [
            "bill" => $bill,
            "listStudent" => $listStudent,
            "listBook" => $listBook,
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
        $time = $request->get('time');
        $idStudent = $request->get('idStudent');
        $idBook = $request->get('idBook');
        $status = $request->get('status');
        $bill =  Bill::find($id);
        $bill->time = $time;
        $bill->idStudent = $idStudent;
        $bill->idBook = $idBook;
        $bill->status = $status;
        $bill->save();
        return redirect(route('bill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::where('idBill', $id)->delete();
        return redirect(route('bill.index'));
    }
}
