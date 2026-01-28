<section>
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPositionModal"
                onclick="resetPositionForm()">
                Add Position
            </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
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
                                    <x-dropdown>
                                        <button type="button" class="dropdown-item" data-toggle="modal"
                                            data-target="#addPositionModal"
                                            onclick="editPosition({{ $jobPosition->id }}, '{{ addslashes($jobPosition->name) }}')">
                                            Edit
                                        </button>
                                        <form method="POST" action="{{ route('position.destroy', $jobPosition->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger"
                                                onclick="return confirm('Are you sure you want to delete this position?')">Delete</button>
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




    <!-- Add Position Modal -->
    <x-modal id="addPositionModal" title="Add Position">
        <form id="positionForm" method="POST" action="{{ route('position.store') }}">
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


</section>
