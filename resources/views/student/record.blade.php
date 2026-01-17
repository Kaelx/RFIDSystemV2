@extends('adminlte::page')

@section('content_header')
    <h1>Profile Record</h1>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <p><Strong>Schoold ID:</Strong> {{ $record->school_id }}</p>
                <p><Strong>Name:</Strong> {{ $record->first_name }} {{ $record->last_name }}</p>
            </div>
        </div>
    </div>
@endsection
