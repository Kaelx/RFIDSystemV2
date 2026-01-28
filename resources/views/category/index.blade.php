@extends('adminlte::page')

@section('content_header')
    <h1>Categories</h1>
@endsection

@section('content')
    <div class="container-fluid">

        <x-auth-session-status class="mb-2" :status="session('success')" />
        <x-auth-session-status class="mb-2" :status="session('deleted')" />


        <div>
            @include('category.partials.department')
        </div>


        <div>
            @include('category.partials.program')
        </div>


        <div>
            @include('category.partials.job-position')
        </div>





        <script>
            function resetDepartmentForm() {
                document.getElementById('addDepartmentModalLabel').innerText = 'Add Department';
                var form = document.getElementById('departmentForm');
                form.action = '{{ route('department.store') }}';
                document.getElementById('departmentFormMethod').value = 'POST';
                document.getElementById('department-name').value = '';
                document.getElementById('departmentSaveBtn').innerText = 'Save';
            }

            function editDepartment(id, name) {
                // Change modal title
                document.getElementById('addDepartmentModalLabel').innerText = 'Edit Department';
                // Set form action to update route
                var form = document.getElementById('departmentForm');
                form.action = '/department/' + id;
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
                form.action = '{{ route('program.store') }}';
                document.getElementById('programFormMethod').value = 'POST';
                document.getElementById('program-name').value = '';
                document.getElementById('programSaveBtn').innerText = 'Save';
            }

            function editProgram(id, name) {
                document.getElementById('addProgramModalLabel').innerText = 'Edit Program';
                var form = document.getElementById('programForm');
                form.action = '/program/' + id;
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
                form.action = '{{ route('position.store') }}';
                document.getElementById('positionFormMethod').value = 'POST';
                document.getElementById('position-name').value = '';
                document.getElementById('positionSaveBtn').innerText = 'Save';
            }

            function editPosition(id, name) {
                document.getElementById('addPositionModalLabel').innerText = 'Edit Position';
                var form = document.getElementById('positionForm');
                form.action = '/position/' + id;
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
