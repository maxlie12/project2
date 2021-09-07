@extends('layout.app')

@section('content')

    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Thêm Danh sách </h4>
                <div class="table-responsive">
                    <form action="{{ route('bill.store') }}" method="post">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">thời gian nhận sách</label>
                            <input type="datetime-local" name="time" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">idStudent</label>
                            <select name="idStudent" class="form-control">
                                @foreach ($listStudent as $student)
                                    <option value="{{ $student->idStudent }}">
                                        {{ $student->idStudent }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">idBook</label>
                            <select name="idBook" class="form-control">
                                @foreach ($listBook as $book)
                                    <option value="{{ $book->idBook }}">
                                        {{ $book->idBook }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1">đã nhận</option>
                                <option value="0">chưa nhận</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
