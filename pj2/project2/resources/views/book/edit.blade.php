@extends('layout.app')

@section('content')

    <h1>sửa book</h1>
    <form action="{{ route('book.update', $book->idBook) }}" method="post">
        @method('Put')
        @csrf
        Namebook: <input type="text" name="name" value="{{ $book->nameBook }}">
        <br>
        amout: <input type="text" name="amout" value="{{ $book->amout }}">
        <br>
        idSubject: <input type="text" name="idSubject" readonly value="{{ $book->idSubject }}"><br>
        <button>Fix</button>
    </form>

@endsection
