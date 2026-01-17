@extends('adminlte::page')

@section('content_header')
    <h1>Add New Student</h1>
@endsection


@section('content')
    <div class="container-fluid">

        {{-- <x-input-error :messages="$errors->all()" /> --}}

        <div class="card">
            <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h2 class="card-title">Form</h2>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <x-input-label for="school_id" value="School ID" />
                        <x-text-input type="text" id="school_id" name="school_id" value="{{ old('school_id') }}" />
                        <x-input-error :messages="$errors->get('school_id')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="fname" value="First Name" />
                        <x-text-input type="text" id="fname" name="fname" value="{{ old('fname') }}" />
                        <x-input-error :messages="$errors->get('fname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="mname" value="Middle Name" />
                        <x-text-input type="text" id="mname" name="mname" value="{{ old('mname') }}" />
                        <x-input-error :messages="$errors->get('mname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="lname" value="Last Name" />
                        <x-text-input type="text" id="lname" name="lname" value="{{ old('lname') }}" />
                        <x-input-error :messages="$errors->get('lname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="sname" value="Suffix Name" />
                        <x-text-input type="text" id="sname" name="sname" value="{{ old('sname') }}" />
                        <x-input-error :messages="$errors->get('sname')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="bdate" value="Birthdate" />
                        <x-text-input type="date" id="bdate" name="bdate" value="{{ old('bdate') }}" />
                        <x-input-error :messages="$errors->get('bdate')" />
                    </div>
                    <div class="mb-2">
                        <x-input-label for="sex" value="Sex" />
                        <select name="sex" id="sex" class="form-control">
                            <option value="" selected>-- Select --</option>
                            <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="none" {{ old('sex') == 'none' ? 'selected' : '' }}>Prefer not to say
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('sex')" />
                    </div>

                    <div class="mb-2">
                        <x-input-label for="program" value="Program/Course" />
                        <select name="program_id" id="program" class="form-control">
                            <option value="">-- Select --</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}" data-department-id="{{ $program->department_id }}">
                                    {{ $program->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('program')" />
                    </div>

                    <div class="mb-2">
                        <x-input-label for="image" value="Upload Image" />
                        <x-text-input type="file" id="image" name="image" accept="image/*" />
                        <x-input-error :messages="$errors->get('image')" />
                    </div>


                    <div class="mb-2">
                        <x-input-label for="rfid" value="Scan RFID" />
                        <x-text-input type="password" id="rfid" name="rfid" value="{{ old('rfid') }}" />
                        <x-input-error :messages="$errors->get('rfid')" />
                    </div>

                </div>
                <div class="card-footer">
                    <x-primary-button type="submit">Save</x-primary-button>
                    <a href="{{ route('student.index') }}"><x-secondary-button
                            type="button">Cancel</x-secondary-button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
