@extends('layout.app')

@section('content')

    <h1>sửa Grade</h1>
    <form action="{{ route('bill.update', $bill->idBill) }}" method="post">
        @method('Put')
        @csrf
        time: <input type="text" name="time" value="{{ $bill->time }}">
        <br>
        idStudent: <input type="text" name="idStudent" readonly value="{{ $bill->idStudent }}"><br>
        <button>Fix</button>
    </form>

@endsection
