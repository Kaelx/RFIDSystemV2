<section>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProgramModal"
                onclick="resetProgramForm()">
                Add Program
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
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
                                    <x-dropdown>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#addProgramModal"
                                            onclick="editProgram({{ $program->id }}, '{{ addslashes($program->name) }}')">
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('program.destroy', $program->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Are you sure you want to delete this program?')">Delete</button>
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





    <!-- Add Program Modal -->
    <x-modal id="addProgramModal" title="Add Program">
        <form id="programForm" method="POST" action="{{ route('program.store') }}">
            @csrf
            <input type="hidden" name="_method" id="programFormMethod" value="POST">
            <div class="form-group">
                <x-input-label for="program-name" value="Program Name" />
                <x-text-input id="program-name" name="name" type="text" required />
            </div>
            <div class="form-group">
                <x-input-label for="department-program" value="Select Department" />
                <select class="form-control" name="department_id" id="department-program" required>
                    <option value="">-- Select --</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>

        <x-slot name="footer">
            <x-secondary-button data-dismiss="modal">Close</x-secondary-button>
            <x-primary-button form="programForm" id="programSaveBtn">Save</x-primary-button>
        </x-slot>
    </x-modal>
</section>
