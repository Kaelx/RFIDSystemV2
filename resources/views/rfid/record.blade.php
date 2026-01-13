@extends('adminlte::page')

@section('content_header')
    <h1>Records</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>
                                    {{ ($record->recordable->fname ?? '') .
                                        ' ' .
                                        ($record->recordable->mname ?? '') .
                                        ' ' .
                                        ($record->recordable->lname ?? '') .
                                        ' ' .
                                        ($record->recordable->sname ?? '') }}
                                </td>
                                <td>{{ $record->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{ $records->links() }}
                </table>
            </div>
        </div>
    </div>
@endsection
