@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@endsection

@section('content')
    <div class="container">
        <div>
            <a href="{{ route('employees.create') }}" class="btn btn-primary m-2">Add Employee</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>School ID</th>
                    <th>Name</th>
                    <th>Profile Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td> {{ $employee->school_id }}</td>
                        <td>{{ $employee->fname . ' ' . $employee->mname . ' ' . $employee->lname . ' ' . $employee->sname }}
                        </td>
                        <td><img src="{{ asset('storage/' . $employee->profile_image) }}" alt=""></td>
                        <td>
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
