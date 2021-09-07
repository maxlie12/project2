@extends('layout.app')
@section('title', 'ListBook')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">DataTables.net</h4>
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
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
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                    cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>idBook</th>
                                            <th>nameBook</th>
                                            <th>Name Subject</th>
                                            <th>Course</th>
                                            <th>Name Grade</th>
                                            <th>amout</th>
                                            <th>time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id sách</th>
                                            <th>tên sách</th>
                                            <th>Tên môn học</th>
                                            <th>Khóa</th>
                                            <th>Tên Lớp</th>
                                            <th>Số lượng</th>
                                            <th>thời gian phát</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listBook as $book)


                                            <tr>
                                                <td>{{ $book->idBook }}</td>
                                                <td>{{ $book->nameBook }}</td>
                                                <td>{{ $book->nameSubject }}</td>
                                                <td>{{ $book->nameCourse }}</td>
                                                <td>{{ $book->nameGrade }}</td>
                                                <td>{{ $book->amout }}</td>
                                                <td>{{ $book->time }}</td>
                                                <td></td>
                                                <td class="text-right">
                                                    <a href="#" class="btn btn-simple btn-info btn-icon like"><i
                                                            class="material-icons">favorite</i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
