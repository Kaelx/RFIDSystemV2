@extends('adminlte::page')

@section('content_header')
    <h1>Student Information</h1>
@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <p><strong>School ID:</strong> {{ $student->school_id }}</p>
                        <p><strong>Name:</strong>
                            {{ $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . $student->sname }}
                        </p>
                        <p><strong>Profile Image:</strong></p>
                        <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->lname }}" class="img-thumbnail"
                            style="max-width: 150px;">
                    </div>
                </div>

                <a href="{{ route('students.edit', $student->id) }}"><x-primary-button>Edit</x-primary-button></a>
                <a href="{{ route('students.index') }}"><x-secondary-button>Back</x-secondary-button></a>
            </div>
        </div>
    </div>
@endsection
