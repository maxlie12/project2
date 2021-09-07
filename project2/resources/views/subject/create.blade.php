@extends('layout.app')
@section('title', 'Thêm Mon')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Thêm Khóa</h4>
                <div class="table-responsive">
                    <form action="{{ route('subject.store') }}" method="post">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Tên Môn</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Tên idGrade</label>
                            <select name="idGrade" class="form-control">
                                @foreach ($listGrade as $grade)
                                    <option value="{{ $grade->idGrade }}">
                                        {{ $grade->idGrade }}
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
