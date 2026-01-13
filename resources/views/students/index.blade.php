@extends('adminlte::page')

@section('content_header')
    <h1>Students</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('students.create') }}"><x-primary-button class="mb-2">Register</x-primary-button></a>
                </div>
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th>School ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr style="cursor:pointer;"
                                onclick="window.location='{{ route('students.show', $student->id) }}'">
                                <td> {{ $student->school_id }}</td>
                                <td>{{ $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . $student->sname }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $students->links() }}
            </div>
        </div>

    </div>
@endsection
