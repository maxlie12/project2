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
                                            <th>idStudent</th>
                                            <th>nameStudent</th>
                                            <th>nameSubject</th>
                                            <th>Course</th>
                                            <th>amout</th>
                                            <th>book register</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id học sinh</th>
                                            <th>tên học sinh</th>
                                            <th>giới tính</th>
                                            <th>Khóa học</th>
                                            <th>số lượng</th>
                                            <th>sách đã đang ký</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($listStudent as $student)
                                            @if ($student->available == 1)
                                                <tr class="info">
                                                    <td>{{ $student->idStudent }}</td>
                                                    <td>{{ $student->nameStudent }}</td>
                                                    <td>{{ $student->birthday }}</td>
                                                    <td>{{ $student->GenderName }}</td>
                                                    <td>{{ $student->NameGrade }}</td>
                                                    <td>{{ $student->AvailableText }}</td>
                                                    <td class="td-actions text-left">
                                                        <a href="{{ route('student.edit', $student->idStudent) }}">
                                                            <button type="button" rel="tooltip" class="btn btn-success">
                                                                <i class="material-icons">edit</i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
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
