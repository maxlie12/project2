@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h4 class="card-title"> Book</h4>
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
                    <form action="{{ route('book.create') }}">
                        <button type="submit" class="btn btn-fill btn-rose ">Thêm Bill</button>
                    </form>
                </div>

                <table class="table table-hover table-responsive">
                    <tr class="danger">
                        <th>id</th>
                        <th>time</th>
                        <th>idStudent</th>
                        <th>nameStudent</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($listBill as $bill)
                        <tr class="info">
                            <td>{{ $bill->idBill }}</td>
                            <td>{{ $bill->time }}</td>
                            <td>{{ $bill->idStudent }}</td>
                            <td>{{ $bill->nameStudent }}</td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('bill.show', $bill->idBill) }}">Xem</a>
                            </td>
                            <td><a class="btn btn-sm btn-primary" href="{{ route('bill.edit', $bill->idBill) }}">Fix</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $listBill->links('pagination::bootstrap-4') }}

                </table>
            </div>
        </div>
    @endsection
