@extends('layout.app')

@section('content')
    <form action="{{ route('bill.store') }}" method="post">
        @csrf
        time: <input type="datetime" name="time">
        idStudent <input type="text" name="idStudent">
        <button>ok</button>
    </form>
@endsection
