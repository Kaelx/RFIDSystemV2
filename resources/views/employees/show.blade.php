@extends('adminlte::page')

@section('content_header')
    <h1>Employee Info</h1>
@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <p><strong>School ID:</strong> {{ $employee->school_id }}</p>
                        <p><strong>Name:</strong>
                            {{ $employee->fname . ' ' . $employee->mname . ' ' . $employee->lname . ' ' . $employee->sname }}
                        </p>
                        <p><strong>Profile Image:</strong></p>
                        <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->lname }}"
                            class="img-thumbnail" style="max-width: 150px;">
                    </div>
                </div>

                <a href="{{ route('employees.edit', $employee->id) }}"><x-primary-button>Edit</x-primary-button></a>
                <a href="{{ route('employees.index') }}"><x-secondary-button>Back</x-secondary-button></a>
            </div>
        </div>
    </div>
@endsection
