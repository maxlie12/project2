@extends('layout.app')

@section('content')
    <form action="{{ route('book.store') }}" method="post">
        @csrf
        NameBook:<input type="text" name="name">
        amout: <input type="text" name="amout">
        idSubject <input type="text" name="idSubject">
        <button>ok</button>
    </form>
@endsection
