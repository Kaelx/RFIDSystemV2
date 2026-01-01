@extends('adminlte::auth.login')

@section('auth_body')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group mb-3">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row mb-0">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Email Password Reset Link') }}</button>
            </div>
        </div>
    </form>
@endsection
