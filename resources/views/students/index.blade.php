@extends('adminlte::page')

@section('content_header')
    <h1>Students</h1>
@endsection

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('students.create') }}"><button class="btn btn-primary m-2">Add Student</button></a>
        </div>

        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Profile Image</th>
                    <th>Actions</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->school_id }}</td>
                        <td>{{ $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . $student->sname }}
                        </td>
                        <td><img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->lname }}"
                                class="img-thumbnail" style="max-width: 50px;"></td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @push('js')
            <script>
                $(function() {
                    $('#users-table').DataTable({
                        responsive: true,
                        autoWidth: false,
                    });
                });
            </script>
        @endpush

    </div>
@endsection
