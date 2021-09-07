@extends('layout.app')
@section('title', 'Cật Nhật Khóa')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Sửa Khóa</h4>
                <div class="table-responsive">
                    <form action="{{ route('course.update', $course->idCourse) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Mã</label>
                            <input type="text" name="id" readonly value="{{ $course->idCourse }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Tên Khóa</label>
                            <input type="text" name="name-course" value="{{ $course->nameCourse }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
