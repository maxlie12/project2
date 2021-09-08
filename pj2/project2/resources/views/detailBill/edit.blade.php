@extends('layout.app')

@section('content')

    <h1>sửa detailBill</h1>
    <form action="{{ route('detailBill.update', $detailbill->idDetailBill) }}" method="post">
        @method('Put')
        @csrf
        idBook: <input type="text" name="idBook" readonly value="{{ $detailbill->idBook }}">
        <br>
        status: <input type="text" name="status" value="{{ $detailbill->status }}"><br>
        <button>Fix</button>
    </form>

@endsection
