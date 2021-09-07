@extends('layout.app')
@section('title', 'Sinh Viên')
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title">Danh sách sinh viên</h4>
        <div class="table-responsive">
            <div class="col-md-8">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            Chọn lớp
                            <select name="idGrade">
                                @foreach ($ListGrade as $grade)
                                    <option value="{{ $grade->idGrade }}" @if ($grade->idGrade == $idGrade)
                                        selected
                                @endif
                                >
                                {{ $grade->NameGrade }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" class="form-group form-search is-empty">
                            <input type="text" class="form-control" placeholder=" Search " name="search"
                                value="{{ $search }}">
                            <span class="material-input"></span>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-rose btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="{{ route('student.create') }}">
                    <button type="submit" class="btn btn-fill btn-rose ">Thêm sinh viên</button>
                </form>
            </div>

            <table class="table table-hover table-responsive">
                <tr class="danger">
                    <td>Mã Sinh Viên</td>
                    <td>Tên Sinh Viên</td>
                    <td>Ngày Sinh</td>
                    <td>Giới Tính</td>
                    <td>Lớp</td>
                    <td>Đăng kí</td>
                    <td></td>
                </tr>
                <?php foreach ($ListStudent as $student): ?>
                <tr class="info">
                    <td>{{ $student->idStudent }}</td>
                    <td>{{ $student->nameStudent }}</td>
                    <td>{{ $student->birthday }}</td>
                    <td>{{ $student->GenderName }}</td>
                    <td>{{ $student->NameGrade }}</td>
                    <td>{{ $student->AvailableText }}</td>
                    <td class="td-actions text-left">
                        <a href="{{ route('student.edit', $student->idStudent) }}">
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            {{ $ListStudent->appends([
        'search' => $search,
        'idGrade' => $idGrade,
    ])->links() }}
        </div>
    </div>
@endsection
