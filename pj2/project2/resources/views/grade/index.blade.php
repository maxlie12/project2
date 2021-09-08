@extends('layout.app')
@section('title', 'Lớp')
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title">Danh sách lớp</h4>
        <div class="table-responsive">
            <div class="row">
                <div class="col-md-8">
                    <form action="">
                        <div class="col-md-4">
                            <select name="idCourse">
                                @foreach ($ListCourse as $course)
                                    <option value="{{ $course->idCourse }}" @if ($course->idCourse == $idCourse)
                                        selected
                                @endif
                                >
                                {{ $course->nameCourse }}
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
                    </form>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('grade.create') }}">
                        <button type="submit" class="btn btn-fill btn-rose">Thêm Lớp</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover table-responsive">
                <tr class="danger">
                    <td>Mã</td>
                    <td>Khóa</td>
                    <td>Tên lớp</td>
                </tr>
                <?php foreach ($ListGrade as $grade): ?>
                <tr class="info">
                    <td>{{ $grade->idGrade }}</td>
                    <td>{{ $grade->nameCourse }}</td>
                    <td>{{ $grade->nameGrade }}</td>
                    <td class="td-actions text-left">
                        <a href="{{ route('grade.edit', $grade->idGrade) }}">
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            {{ $ListGrade->appends([
        'search' => $search,
        'idCourse' => $idCourse,
    ])->links() }}
        </div>
    </div>
@endsection
