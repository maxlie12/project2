@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose">
            <i class="material-icons">assignment</i>
        </div>
        <div class="card-content">
            <h4 class="card-title"> Bill</h4>
            <div class="table-responsive">
                <h4 class="card-title"> Book</h4>
                <div class="table-responsive">
                    <div class="col-md-8">
                        <form action="">
                            <div class="col-md-4" class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder=" Search " name="search" value="">

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
                    @php $users = DB::table('detailBill')->get(); @endphp
                    {{-- <div class="col-md-6">
                        <form action="">
                            <select name="id-bill">
                                <option value="id-bill">
                                    @foreach ($listdetailBill as $bill)
                                        {{ $bill->idBill }}
                                    @endforeach
                                </option>
                            </select>
                            <button>tìm</button>
                        </form>
                    </div> --}}

                    <table class="table table-hover table-responsive">
                        <tr class="danger">
                            <th>idDetailBill</th>
                            <th>idBook</th>
                            <th>status</th>
                        </tr>
                        @foreach ($listdetailBill as $bill)
                            <tr class="info">
                                <td>{{ $bill->idDetailBill }}</td>
                                <td>{{ $bill->idBook }}</td>
                                <td>
                                    {{-- {{ $bill->status }} --}}
                                    @if ($bill->status)
                                        <span class="text-success">đã nhận</span>
                                    @else ()
                                        <span class="text-secondary">chưa nhận</span>
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                    </table>
                    {{ $listdetailBill->links('pagination::bootstrap-4') }}

                    </table>
                </div>
            </div>
        @endsection
