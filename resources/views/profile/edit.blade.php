@extends('adminlte::page')


@section('content_header')
    <h1>Profile</h1>
@endsection

@section('content')
    <div class="container">
        <div>
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
@endsection
