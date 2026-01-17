@extends('adminlte::page')

@section('content_header')
    <h1>Vendor Information</h1>
@endsection

@section('content')
    <div class="container-fluid">

        <x-auth-session-status class="mb-2" :status="session('success')" />


        <div class="card">
            <div class="card-body">
                <p><strong>Profile Image:</strong></p>
                <img src="{{ asset('storage/' . $seller->image) }}" alt="{{ $seller->lname }}" class="img-thumbnail"
                    style="max-width: 150px;">

                <p><strong>Name:</strong>
                    {{ $seller->fname . ' ' . $seller->mname . ' ' . $seller->lname . ' ' . $seller->sname }}
                </p>

                <p><strong>Sex:</strong> {{ $seller->sex }}</p>
                <p><strong>Birthday:</strong> {{ $seller->bdate }}</p>
            </div>
        </div>

        <a href="{{ route('seller.edit', $seller->id) }}"><x-primary-button>Edit</x-primary-button></a>
        <a href="{{ route('seller.record', $seller->id) }}"><x-secondary-button>Record</x-secondary-button></a>
        <a href="{{ route('seller.index') }}"><x-secondary-button>Back</x-secondary-button></a>

    </div>
@endsection
