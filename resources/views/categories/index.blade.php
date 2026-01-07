@extends('adminlte::page')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="container-fluid">


        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDepartmentModal"
                    onclick="resetDepartmentForm()">
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


        <hr>

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProgramModal"
                    onclick="resetProgramForm()">
                    Add Program
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Program/Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#addProgramModal"
                                                onclick="editProgram({{ $program->id }}, '{{ addslashes($program->name) }}')">
                                                Edit
                                            </button>
                                            <form method="POST" action="{{ route('programs.destroy', $program->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Are you sure you want to delete this program?')">Delete</button>
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


        <hr>


        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPositionModal"
                    onclick="resetPositionForm()">
                    Add Position
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Job Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobPositions as $jobPosition)
                            <tr>
                                <td>{{ $jobPosition->name }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#addPositionModal"
                                                onclick="editPosition({{ $jobPosition->id }}, '{{ addslashes($jobPosition->name) }}')">
                                                Edit
                                            </button>
                                            <form method="POST"
                                                action="{{ route('positions.destroy', $jobPosition->id) }}"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    onclick="return confirm('Are you sure you want to delete this position?')">Delete</button>
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
        <x-modal id="addDepartmentModal" title="Add Department">
            <form id="departmentForm" method="POST" action="{{ route('departments.store') }}">
                @csrf
                <input type="hidden" name="_method" id="departmentFormMethod" value="POST">
                <div class="form-group">
                    <x-input-label for="department-name" value="Department Name" />
                    <x-text-input id="department-name" name="name" type="text" required />
                </div>
            </form>

            <x-slot name="footer">
                <x-secondary-button data-dismiss="modal">Close</x-secondary-button>
                <x-primary-button form="departmentForm" id="departmentSaveBtn">Save</x-primary-button>
            </x-slot>
        </x-modal>


        <!-- Add Program Modal -->
        <x-modal id="addProgramModal" title="Add Program">
            <form id="programForm" method="POST" action="{{ route('programs.store') }}">
                @csrf
                <input type="hidden" name="_method" id="programFormMethod" value="POST">
                <div class="form-group">
                    <x-input-label for="program-name" value="Program Name" />
                    <x-text-input id="program-name" name="name" type="text" required />
                </div>
            </form>

            <x-slot name="footer">
                <x-secondary-button data-dismiss="modal">Close</x-secondary-button>
                <x-primary-button form="programForm" id="programSaveBtn">Save</x-primary-button>
            </x-slot>
        </x-modal>


        <!-- Add Position Modal -->
        <x-modal id="addPositionModal" title="Add Position">
            <form id="positionForm" method="POST" action="{{ route('positions.store') }}">
                @csrf
                <input type="hidden" name="_method" id="positionFormMethod" value="POST">
                <div class="form-group">
                    <x-input-label for="position-name" value="Position Name" />
                    <x-text-input id="position-name" name="name" type="text" required />
                </div>
            </form>

            <x-slot name="footer">
                <x-secondary-button data-dismiss="modal">Close</x-secondary-button>
                <x-primary-button form="positionForm" id="positionSaveBtn">Save</x-primary-button>
            </x-slot>
        </x-modal>


        <script>
            function resetDepartmentForm() {
                document.getElementById('addDepartmentModalLabel').innerText = 'Add Department';
                var form = document.getElementById('departmentForm');
                form.action = '{{ route('departments.store') }}';
                document.getElementById('departmentFormMethod').value = 'POST';
                document.getElementById('department-name').value = '';
                document.getElementById('departmentSaveBtn').innerText = 'Save';
            }

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
                resetDepartmentForm();
            });

            // Program Functions
            function resetProgramForm() {
                document.getElementById('addProgramModalLabel').innerText = 'Add Program';
                var form = document.getElementById('programForm');
                form.action = '{{ route('programs.store') }}';
                document.getElementById('programFormMethod').value = 'POST';
                document.getElementById('program-name').value = '';
                document.getElementById('programSaveBtn').innerText = 'Save';
            }

            function editProgram(id, name) {
                document.getElementById('addProgramModalLabel').innerText = 'Edit Program';
                var form = document.getElementById('programForm');
                form.action = '/programs/' + id;
                document.getElementById('programFormMethod').value = 'PATCH';
                document.getElementById('program-name').value = name;
                document.getElementById('programSaveBtn').innerText = 'Update';
            }

            $('#addProgramModal').on('hidden.bs.modal', function() {
                resetProgramForm();
            });

            // Position Functions
            function resetPositionForm() {
                document.getElementById('addPositionModalLabel').innerText = 'Add Position';
                var form = document.getElementById('positionForm');
                form.action = '{{ route('positions.store') }}';
                document.getElementById('positionFormMethod').value = 'POST';
                document.getElementById('position-name').value = '';
                document.getElementById('positionSaveBtn').innerText = 'Save';
            }

            function editPosition(id, name) {
                document.getElementById('addPositionModalLabel').innerText = 'Edit Position';
                var form = document.getElementById('positionForm');
                form.action = '/positions/' + id;
                document.getElementById('positionFormMethod').value = 'PATCH';
                document.getElementById('position-name').value = name;
                document.getElementById('positionSaveBtn').innerText = 'Update';
            }

            $('#addPositionModal').on('hidden.bs.modal', function() {
                resetPositionForm();
            });
        </script>

    </div>
@endsection
