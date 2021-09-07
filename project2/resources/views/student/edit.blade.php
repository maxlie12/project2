@extends('layout.app')
@section('title', 'Cập Nhật Sinh Viên')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Sửa Sinh Viên</h4>
                <div class="table-responsive">
                    <form action="{{ route('student.update', $student->idStudent) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Mã</label>
                            <input type="text" name="id" readonly value="{{ $student->idStudent }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Tên Sinh Viên</label>
                            <input type="text" name="name" value="{{ $student->nameStudent }}" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ngày sinh</label>
                            <input type="date" name="birthdate" value="{{ $student->birthday }}"
                                class="form-control datepicker" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lớp</label>
                            <select name="idGrade" class="form-control">
                                @foreach ($ListGrade as $grade)
                                    <option value="{{ $grade->idGrade }}" @if ($grade->idGrade == $student->idGrade)
                                        selected
                                @endif
                                >
                                {{ $grade->NameGrade }}
                                </option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label class="control-label">Giới tính</label>
                                <select name="gender" class="form-control">
                                    <option value="0" @if ($student->gender == 0)
                                        selected
                                        @endif>Nữ</option>
                                    <option value="1" @if ($student->gender == 1)
                                        selected
                                        @endif>Nam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Đăng kí mua sách</label>
                                <select name="available" class="form-control">
                                    <option value="0" @if ($student->available == 0)
                                        selected
                                        @endif>Không đăng kí</option>
                                    <option value="1" @if ($student->available == 1)
                                        selected
                                        @endif>Đăng kí</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
