@extends('adminlte::page')

@section('content_header')
    <h1>{{ __('Dashboard') }}</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    {{ __('Dashboard') }}
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ __("You're logged in!") }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
