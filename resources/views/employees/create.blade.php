@extends('adminlte::page')

@section('content_header')
    <h1>Add New Employee</h1>
@endsection


@section('content')
    <div class="container">
        @csrf
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            <div>
                <x-input-label for="school_id" value="School ID" />
                <x-text-input id="school_id" name="school_id" type="text" value="{{ old('school_id') }}" />
            </div>
            <div>
                <x-input-label for="fname" value="First Name" />
                <x-text-input id="fname" name="fname" type="text" value="{{ old('fname') }}" />
            </div>
            <div>
                <x-input-label for="mname" value="Middle Name" />
                <x-text-input id="mname" name="mname" type="text" value="{{ old('mname') }}" />
            </div>
            <div>
                <x-input-label for="lname" value="Last Name" />
                <x-text-input id="lname" name="lname" type="text" value="{{ old('lname') }}" />
            </div>
            <div>
                <x-input-label for="sname" value="Suffix Name" />
                <x-text-input id="sname" name="sname" type="text" value="{{ old('sname') }}" />
            </div>
            <div>
                <x-input-label for="bdate" value="Birthdate" />
                <x-text-input id="bdate" name="bdate" type="date" value="{{ old('bdate') }}" />
            </div>
            <div>
                <x-input-label for="sex" value="Sex" />
                <select name="sex" id="sex" class="form-control">
                    <option value="" selected>Please Choose</option>
                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="none" {{ old('sex') == 'none' ? 'selected' : '' }}>Prefer not to say
                    </option>
                </select>
            </div>
            <div>
                <x-input-label for="image" value="Upload Image" />
                <x-text-input id="image" name="image" type="file" class="form-control-file" accept="image/*" />
            </div>

            <div>
                <a href="{{ route('employees.index') }}"><button type="button"
                        class="btn btn-secondary">Cancel</button></a>
            </div>


        </form>
    </div>
@endsection
