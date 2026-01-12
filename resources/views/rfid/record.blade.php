@extends('adminlte::page')

@section('content_header')
    <h1>Records</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>School ID</th>
                            <th>Name</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->student->school_id ?? '-' }}</td>
                                <td>
                                    {{ $record->student->fname .
                                        ' ' .
                                        $record->student->mname .
                                        ' ' .
                                        $record->student->lname .
                                        ' ' .
                                        $record->student->sname }}
                                </td>
                                <td>{{ $record->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
