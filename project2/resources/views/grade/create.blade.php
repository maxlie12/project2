@extends('layout.app')
@section('title', 'Thêm Lớp')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Thêm lớp</h4>
                <div class="table-responsive">
                    <form action="{{ route('grade.store') }}" method="post">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Tên Lớp</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Khóa</label>
                            <select name="idCourse" class="form-control">
                                @foreach ($ListCourse as $course)
                                    <option value="{{ $course->idCourse }}">
                                        {{ $course->nameCourse }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
