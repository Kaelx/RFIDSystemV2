@extends('adminlte::page')

@section('content_header')
    <h1>Add New Student</h1>
@endsection

@section('content')
    <div class="container">

        @if ($errors->all())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Information</h3>
                    </div>
                    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="school_id">School ID</label>
                                <input type="text" id="school_id" name="school_id" class="form-control"
                                    value="{{ old('school_id') }}">
                            </div>
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" class="form-control"
                                    value="{{ old('fname') }}">
                            </div>
                            <div class="form-group">
                                <label for="mname">Middle Name</label>
                                <input type="text" id="mname" name="mname" class="form-control"
                                    value="{{ old('mname') }}">
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="lname" class="form-control"
                                    value="{{ old('lname') }}">
                            </div>
                            <div class="form-group">
                                <label for="sname">Sur Name</label>
                                <input type="text" id="sname" name="sname" class="form-control"
                                    value="{{ old('sname') }}">
                            </div>
                            <div class="form-group">
                                <label for="bdate">Birthdate</label>
                                <input type="date" id="bdate" name="bdate" class="form-control"
                                    value="{{ old('bdate') }}">
                            </div>
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select name="sex" id="sex" class="form-control">
                                    <option value="" selected>Please Choose</option>
                                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="none" {{ old('sex') == 'none' ? 'selected' : '' }}>Prefer not to say
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" id="image" name="image" class="form-control-file"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
