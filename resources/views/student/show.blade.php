@extends('adminlte::page')

@section('content_header')
    <h1>Student Information</h1>
@endsection

@section('content')
    <div class="container-fluid">

        <x-auth-session-status class="mb-2" :status="session('success')" />

        <div class="card">
            <div class="card-body">
                <p><strong>Profile Image:</strong></p>
                <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->lname }}" class="img-thumbnail"
                    style="max-width: 150px;">

                <p><strong>School ID:</strong> {{ $student->school_id }}</p>
                <p><strong>Name:</strong>
                    {{ $student->fname . ' ' . $student->mname . ' ' . $student->lname . ' ' . $student->sname }}
                </p>

                <p><strong>Sex:</strong> {{ $student->sex }}</p>
                <p><strong>Birthday:</strong> {{ $student->bdate }}</p>

                <p><strong>Program/Course:</strong> {{ $student->program->name }}</p>
                <p><strong>Department:</strong> {{ $student->program->department->name }}</p>
            </div>
        </div>

        <a href="{{ route('student.edit', $student->id) }}"><x-primary-button>Edit</x-primary-button></a>
        <a href="{{ route('student.record', $student->id) }}"><x-secondary-button>Record</x-secondary-button></a>
        <a href="{{ route('student.index') }}"><x-secondary-button>Back</x-secondary-button></a>
    </div>
@endsection
