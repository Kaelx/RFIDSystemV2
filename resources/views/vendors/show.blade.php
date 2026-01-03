@extends('adminlte::page')

@section('content_header')
    <h1>Vendor Information</h1>
@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <p><strong>Name:</strong>
                            {{ $vendor->fname . ' ' . $vendor->mname . ' ' . $vendor->lname . ' ' . $vendor->sname }}
                        </p>
                        <p><strong>Profile Image:</strong></p>
                        <img src="{{ asset('storage/' . $vendor->image) }}" alt="{{ $vendor->lname }}" class="img-thumbnail"
                            style="max-width: 150px;">
                    </div>
                </div>

                <a href="{{ route('vendors.edit', $vendor->id) }}"><x-primary-button>Edit</x-primary-button></a>
                <a href="{{ route('vendors.index') }}"><x-secondary-button>Back</x-secondary-button></a>
            </div>
        </div>
    </div>
@endsection
