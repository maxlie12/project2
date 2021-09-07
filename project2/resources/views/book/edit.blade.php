@extends('layout.app')
@section('title', 'Cập Nhật Lớp')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Sửa Lớp</h4>
                <div class="table-responsive">
                    <form action="{{ route('book.update', $book->idBook) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Mã</label>
                            <input type="text" name="name" readonly value="{{ $book->nameBook }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Lớp</label>
                            <input type="text" name="amout" value="{{ $book->amout }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Lớp</label>
                            <input type="text" name="idSubject" readonly value="{{ $book->idSubject }}"
                                class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Khóa</label>
                            <select name="idSubject" class="form-control">
                                @foreach ($listSubject as $subject)
                                    <option value="{{ $subject->idSubject }}" @if ($subject->idSubject == $book->idSubject)
                                        selected
                                @endif
                                >
                                {{ $subject->nameSubject }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
