@extends('layout.app')
@section('title', 'Thêm Khóa')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Thêm Khóa</h4>
                <div class="table-responsive">
                    <form action="{{ route('course.store') }}" method="post">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Tên Khóa</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
