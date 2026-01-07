@extends('adminlte::page')

@section('content_header')
    <h1>Employees</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <a href="{{ route('employees.create') }}"><x-primary-button class="mb-2">Register</x-primary-button></a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>School ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr style="cursor:pointer;"
                                onclick="window.location='{{ route('employees.show', $employee->id) }}'">
                                <td>{{ $employee->school_id }}</td>
                                <td>{{ "{$employee->fname} {$employee->mname} {$employee->lname} {$employee->sname}" }}</td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>

                {{ $employees->links() }}
            </div>
        </div>
    </div>


    {{-- @push('js')
        <script>
            $(function() {
                $('#users-table').DataTable({
                    responsive: true,
                    autoWidth: false,
                });
            });
        </script>
    @endpush --}}
@endsection
