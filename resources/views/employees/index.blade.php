@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@endsection

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('employees.create') }}"><x-primary-button class="mb-2">Add Employee</x-primary-button></a>
        </div>
        <table class="table table-bordered" id="users-table">
            <thead>
                <tr>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td> {{ $employee->school_id }}</td>
                        <td>{{ $employee->fname . ' ' . $employee->mname . ' ' . $employee->lname . ' ' . $employee->sname }}
                        </td>
                        <td>
                            <a
                                href="{{ route('employees.show', $employee->id) }}"><x-primary-button>View</x-primary-button></a>

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
