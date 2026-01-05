@extends('adminlte::page')

@section('content_header')
    <h1>Vendor Information</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <p><strong>Profile Image:</strong></p>
                <img src="{{ asset('storage/' . $vendor->image) }}" alt="{{ $vendor->lname }}" class="img-thumbnail"
                    style="max-width: 150px;">

                <p><strong>School ID:</strong> {{ $vendor->school_id }}</p>
                <p><strong>Name:</strong>
                    {{ $vendor->fname . ' ' . $vendor->mname . ' ' . $vendor->lname . ' ' . $vendor->sname }}
                </p>

                <p><strong>Sex:</strong> {{ $vendor->sex }}</p>
                <p><strong>Birthday:</strong> {{ $vendor->bdate }}</p>
            </div>
        </div>

        <a href="{{ route('vendors.edit', $vendor->id) }}"><x-primary-button>Edit</x-primary-button></a>
        <a href="{{ route('vendors.index') }}"><x-secondary-button>Back</x-secondary-button></a>

    </div>
@endsection
