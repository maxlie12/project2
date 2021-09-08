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
                        <button type="submit" class="btn btn-fill btn-rose ">Thêm subject</button>
                    </form>
                </div>

                <table class="table table-hover table-responsive">
                    <tr class="danger">
                        <th>id</th>
                        <th>Namesubject</th>
                        <th>idGrade</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($listSubject as $subject)
                        <tr class="info">
                            <td>{{ $subject->idSubject }}</td>
                            <td>{{ $subject->nameSubject }}</td>
                            <td>{{ $subject->idGrade }}</td>
                            <td><a class="btn btn-sm btn-primary"
                                    href="{{ route('subject.show', $subject->idSubject) }}">Xem</a></td>
                            <td><a class="btn btn-sm btn-primary"
                                    href="{{ route('subject.edit', $subject->idSubject) }}">Fix</a></td>
                            <td>
                                <form action="{{ route('subject.destroy', $subject->idSubject) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-primary">Xoa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {{ $listSubject->links('pagination::bootstrap-4') }}

                </table>
            </div>
        </div>
    @endsection
