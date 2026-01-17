@extends('adminlte::page')

@section('content_header')
    <h1>Edit Employee</h1>
@endsection


@section('content')
    <div class="container-fluid">

        {{-- <x-input-error :messages="$errors->all()" /> --}}

        <div class="card">
            <form action="{{ route('employee.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-header">
                    <h2 class="card-title">Form</h2>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <x-input-label for="school_id" value="School ID" />
                        <x-text-input type="text" id="school_id" name="school_id"
                            value="{{ old('school_id', $employee->school_id) }}" />
                        <x-input-error :messages="$errors->get('school_id')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="fname" value="First Name" />
                        <x-text-input type="text" id="fname" name="fname"
                            value="{{ old('fname', $employee->fname) }}" />
                        <x-input-error :messages="$errors->get('fname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="mname" value="Middle Name" />
                        <x-text-input type="text" id="mname" name="mname"
                            value="{{ old('mname', $employee->mname) }}" />
                        <x-input-error :messages="$errors->get('mname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="lname" value="Last Name" />
                        <x-text-input type="text" id="lname" name="lname"
                            value="{{ old('lname', $employee->lname) }}" />
                        <x-input-error :messages="$errors->get('lname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="sname" value="Suffix Name" />
                        <x-text-input type="text" id="sname" name="sname"
                            value="{{ old('sname', $employee->sname) }}" />
                        <x-input-error :messages="$errors->get('sname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="bdate" value="Birthdate" />
                        <x-text-input type="date" id="bdate" name="bdate"
                            value="{{ old('bdate', $employee->bdate) }}" />
                        <x-input-error :messages="$errors->get('bdate')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="sex" value="Sex" />
                        <select name="sex" id="sex" class="form-control">
                            <option value="" disabled {{ old('sex', $employee->sex) == '' ? 'selected' : '' }}>
                                -- Select--</option>
                            <option value="male" {{ old('sex', $employee->sex) == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('sex', $employee->sex) == 'female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="none" {{ old('sex', $employee->sex) == 'none' ? 'selected' : '' }}>Prefer not
                                to say</option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" />
                    </div>


                    <div class="mb-2">
                        <x-input-label for="department" value="Department" />
                        <select name="department_id" id="department" class="form-control">
                            <option value=""
                                {{ old('department_id', $employee->department_id) == '' ? 'selected' : '' }}>-- Select --
                            </option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('department_id')" />
                    </div>


                    <div class="mb-2">
                        <x-input-label for="position" value="Position" />
                        <select name="position_id" id="position" class="form-control">
                            <option value=""
                                {{ old('position_id', $employee->position_id) == '' ? 'selected' : '' }}>-- Select --
                            </option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ old('position_id', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                    {{ $position->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('position_id')" />
                    </div>


                    <div>
                        <label>Profile Picture</label><br>
                        <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->lname }}"
                            class="img-thumbnail" style="max-width: 150px;">
                    </div>
                    <div class="mb-2">
                        <x-input-label for="image" value="Upload New" />
                        <x-text-input type="file" id="image" name="image" accept="image/*" />
                        <x-input-error :messages="$errors->get('image')" />
                    </div>
                </div>
                <div class="card-footer">
                    <x-primary-button type="submit">Update</x-primary-button>
                    <a href="{{ route('employee.show', $employee->id) }}"><x-secondary-button
                            type="button">Cancel</x-secondary-button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
