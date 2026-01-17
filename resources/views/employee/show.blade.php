@extends('adminlte::page')

@section('content_header')
    <h1>Employee Information</h1>
@endsection

@section('content')
    <div class="container-fluid">

        <x-auth-session-status class="mb-2" :status="session('success')" />

        <div class="card">
            <div class="card-body">
                <p><strong>Profile Image:</strong></p>
                <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->lname }}" class="img-thumbnail"
                    style="max-width: 150px;">

                <p><strong>School ID:</strong> {{ $employee->school_id }}</p>
                <p><strong>Name:</strong>
                    {{ $employee->fname . ' ' . $employee->mname . ' ' . $employee->lname . ' ' . $employee->sname }}
                </p>
                <p><strong>Birthday:</strong> {{ $employee->bdate }}</p>
                <p><strong>Sex:</strong> {{ $employee->sex }}</p>
                <p><strong>Position:</strong> {{ $employee->position->name }}</p>
                <p><strong>Department:</strong> {{ $employee->department->name }}</p>
            </div>
        </div>

        <a href="{{ route('employee.edit', $employee->id) }}"><x-primary-button>Edit</x-primary-button></a>
        <a href="{{ route('employee.index') }}"><x-secondary-button>Back</x-secondary-button></a>

    </div>
@endsection
