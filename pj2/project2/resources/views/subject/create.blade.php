@extends('layout.app')

@section('content')
    <form action="{{ route('subject.store') }}" method="post">
        @csrf
        NameSubject:<input type="text" name="name">
        idGrade <input type="text" name="idGrade">
        <button>ok</button>
    </form>
@endsection
