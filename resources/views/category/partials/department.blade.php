<section>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDepartmentModal"
                onclick="resetDepartmentForm()">
                Add Department
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
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
                                    <x-dropdown>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#addDepartmentModal"
                                            onclick="editDepartment({{ $department->id }}, '{{ addslashes($department->name) }}')">Edit</button>
                                        <form method="POST" action="{{ route('department.destroy', $department->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                                        </form>
                                    </x-dropdown>
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
        <form id="departmentForm" method="POST" action="{{ route('department.store') }}">
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

</section>
