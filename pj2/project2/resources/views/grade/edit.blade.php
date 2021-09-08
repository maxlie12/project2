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
                    <form action="{{ route('grade.update', $grade->idGrade) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Mã</label>
                            <input type="text" name="id" readonly value="{{ $grade->idGrade }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Lớp</label>
                            <input type="text" name="name-grade" value="{{ $grade->nameGrade }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Khóa</label>
                            <select name="idCourse" class="form-control">
                                @foreach ($ListCourse as $course)
                                    <option value="{{ $course->idCourse }}" @if ($course->idCourse == $grade->idCourse)
                                        selected
                                @endif
                                >
                                {{ $course->nameCourse }}
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
