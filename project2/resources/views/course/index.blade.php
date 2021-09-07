@extends('layout.app')
@section('title', 'Khóa')
@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <h4 class="card-title">Danh sách khóa</h4>
        <div class="table-responsive">
            <div class="col-md-8">
                <form action="">
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
                <form action="{{ route('course.create') }}">
                    <button type="submit" class="btn btn-fill btn-rose ">Thêm Khóa</button>
                </form>
            </div>
            <table class="table table-hover table-responsive">
                <tr class="danger">
                    <td>Mã</td>
                    <td>Khóa</td>
                    <td></td>
                </tr>
                <?php foreach ($ListCourse as $course): ?>
                <tr class="info">
                    <td>{{ $course->idCourse }}</td>
                    <td>{{ $course->nameCourse }}</td>
                    <td class="td-actions text-left">
                        <a href="{{ route('course.edit', $course->idCourse) }}">
                            <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            {{ $ListCourse->appends([
        'search' => $search,
    ])->links() }}
        </div>
    </div>
@endsection
