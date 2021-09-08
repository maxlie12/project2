@extends('layout.app')

@section('content')
    <form action="{{ route('detailBill.store') }}" method="post">
        @csrf
        idBook: <input type="datetime" name="idBook">
        status <input type="text" name="status">
        <button>ok</button>
    </form>
@endsection
