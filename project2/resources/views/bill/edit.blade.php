@extends('layout.app')
@section('title', 'Cập Nhật Bill')
@section('content')
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Sửa Bill</h4>
                <div class="table-responsive">
                    <form action="{{ route('bill.update', $bill->idBill) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group label-floating">
                            <label class="control-label">thời gian</label>
                            <input type="text" name="time" value="{{ $bill->time }}" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">id học sinh</label>
                            <select name="idStudent" class="form-control">
                                @foreach ($listStudent as $student)
                                    <option value="{{ $student->idStudent }}" @if ($student->idStudent == $bill->idStudent)
                                        selected
                                @endif
                                >
                                {{ $student->idStudent }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">id sách</label>
                            <select name="idBook" class="form-control">
                                @foreach ($listBook as $book)
                                    <option value="{{ $book->idBook }}" @if ($book->idBook == $bill->idBook)
                                        selected
                                @endif
                                >
                                {{ $book->idBook }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1" @if ($bill->status == 1)
                                    selected
                                    @endif>đã nhận</option>
                                <option value="0" @if ($bill->status == 0)
                                    selected
                                    @endif>chưa nhận</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-fill btn-rose">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
