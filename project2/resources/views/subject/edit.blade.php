@extends('layout.app')

@section('content')

    <h1>sửa subject</h1>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Sửa Lớp</h4>
                <div class="table-responsive">
                    <form action="{{ route('subject.update', $subject->idSubject) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">tên môn học</label>
                            <input type="text" name="name" value="{{ $subject->nameSubject }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">id Lớp</label>
                            <input type="text" name="idGrade" readonly value="{{ $subject->idGrade }}"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
