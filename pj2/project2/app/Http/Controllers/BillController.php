<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\Student;
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
        // $student = $request->get('student');
        // $listBill = Bill::where('idBill', 'like', "%$search%")->paginate(2);
        $listBill = Bill::join("student", "bill.idStudent", "=", "student.idStudent")
            // ->where('student.idStudent', $student)
            ->where("idBill", "like", "%$search%")->paginate(2);
        return view('bill.index', [
            "listBill" => $listBill,
            "search" => $search,
            "listStudent" => $listStudent,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.create');
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
        $bill = new Bill();
        $bill->time = $time;
        $bill->idStudent = $idStudent;
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
        return redirect(route('detailBill.index'));
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
        return view('bill.edit', [
            "bill" => $bill,
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
        $bill = new Bill();
        $bill->time = $time;
        $bill->idStudent = $idStudent;
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
