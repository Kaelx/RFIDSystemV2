@extends('adminlte::page')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDepartmentModal">
                    Add Department
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $department->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#addDepartmentModal"
                                                onclick="editDepartment({{ $department->id }}, '{{ addslashes($department->name) }}')">Edit</button>
                                            <form method="POST"
                                                action="{{ route('departments.destroy', $department->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        <!-- Add Department Modal -->
        <div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog"
            aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDepartmentModalLabel">Add Department</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    // Reset modal when Add Department button is clicked
                    document.querySelector('[data-target="#addDepartmentModal"]').addEventListener('click', function() {
                    document.getElementById('addDepartmentModalLabel').innerText = 'Add Department';
                    var form = document.getElementById('departmentForm');
                    form.action = '{{ route('departments.store') }}';
                    document.getElementById('departmentFormMethod').value = 'POST';
                    document.getElementById('department-name').value = '';
                    document.getElementById('departmentSaveBtn').innerText = 'Save';
                    });
                    <form id="departmentForm" method="POST" action="{{ route('departments.store') }}">
                        @csrf
                        <input type="hidden" name="_method" id="departmentFormMethod" value="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <x-input-label for="department-name" value="Department Name" />
                                <x-text-input id="department-name" name="name" type="text" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="departmentSaveBtn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            function editDepartment(id, name) {
                // Change modal title
                document.getElementById('addDepartmentModalLabel').innerText = 'Edit Department';
                // Set form action to update route
                var form = document.getElementById('departmentForm');
                form.action = '/departments/' + id;
                // Set method to PATCH
                document.getElementById('departmentFormMethod').value = 'PATCH';
                // Fill input
                document.getElementById('department-name').value = name;
                // Change button text
                document.getElementById('departmentSaveBtn').innerText = 'Update';
            }

            // Reset modal when closed
            $('#addDepartmentModal').on('hidden.bs.modal', function() {
                document.getElementById('addDepartmentModalLabel').innerText = 'Add Department';
                var form = document.getElementById('departmentForm');
                form.action = '{{ route('departments.store') }}';
                document.getElementById('departmentFormMethod').value = 'POST';
                document.getElementById('department-name').value = '';
                document.getElementById('departmentSaveBtn').innerText = 'Save';
            });
        </script>

    </div>
@endsection
