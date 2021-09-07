@extends('layout.app')

@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Thêm book</h4>
                <div class="table-responsive">
                    <form action="{{ route('book.store') }}" method="post">
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">Tên Book</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">amout</label>
                            <input type="number" name="amout" class="form-control" required>
                        </div>
                        <div class="form-group label-floating">
                            <label class="label-control">idSubject</label>
                            <select name="idSubject" class="form-control">
                                @foreach ($listSubject as $subject)
                                    <option value="{{ $subject->idSubject }}">
                                        {{ $subject->idSubject }}
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
