<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Models\detailBill;
use App\Models\Bill;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listdetailBill = detailBill::where('idDetailBill', 'like', "%$search%")->paginate(2);
        // $listdetailBill = DB::table('detailBill')
        //     ->join('bill', 'detailbill.idDetailBill ', '=', 'bill.idBill')
        //     ->join('student', 'student.idBook', '=', 'book.idBook')
        //     ->where('idDetailBill', 'like', "%$search%")->paginate(2);
        // $listdetailBill = detailBill::join('bill', 'detailbill.idDetailBill ', '=', 'bill.idBill')
        //     ->where('idDetailBill', 'like', "%$search%")->paginate(2);
        $listBill = Bill::all();
        $listBook = Book::all();
        return view('detailBill.index', [
            'listdetailBill' => $listdetailBill,
            'search' => $search,
            'listBill' => $listBill,
            'listBook' => $listBook,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailBill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idBook = $request->get('idBook');
        $status = $request->get('status');
        $detaibill = new detailBill();
        $detaibill->idBook = $idBook;
        $detaibill->status = $status;
        $detaibill->save();
        return redirect(route('detaiBill.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detaibill = detailBill::where('idDetailBill', $id)->first();
        return $detaibill;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $detaibill = detailBill::find($id);
        // return view('detaiBill.edit', [
        //     "detailbill" => $detaibill,
        // ]);
        $detaibill = detailBill::find($id);
        return view('detailBill.edit', [
            'detailbill' => $detaibill,
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
        $idBook = $request->get('idBook');
        $status = $request->get('status');
        $detaibill = new detailBill();
        $detaibill->idBook = $idBook;
        $detaibill->status = $status;
        $detaibill->save();
        return redirect(route('detaiBill.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        detailBill::where('idDetailBill', $id)->delete();
        return redirect(route('detaiBill.index'));
    }
    public function billOnlineStatus()
    {
        $detaibill = DB::table('detaibill')->get();

        foreach ($detaibill as $detaibill) {
            if (Cache::has('book-is-done-' . $detaibill->status) == 1)
                echo "Book " . $detaibill->status . " da nhan.";
            else
                echo "Book " . $detaibill->status . " chua nhan.";
        }
    }
}
