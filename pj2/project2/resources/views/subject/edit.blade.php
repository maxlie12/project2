@extends('layout.app')

@section('content')

    <h1>sửa subject</h1>
    <form action="{{ route('subject.update', $subject->idSubject) }}" method="post">
        @method('Put')
        @csrf
        Namesubject: <input type="text" name="name" value="{{ $subject->nameSubject }}">
        <br>
        idGrade: <input type="text" name="idGrade" readonly value="{{ $subject->idGrade }}"><br>
        <button>Fix</button>
    </form>

@endsection
