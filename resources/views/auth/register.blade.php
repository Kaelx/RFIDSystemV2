@extends('adminlte::auth.login')

@section('auth_body')
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="input-group mb-3">
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                autocomplete="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="input-group mb-3">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
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

        <!-- Password -->
        <div class="input-group mb-3">
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="input-group mb-3">
            <input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="{{ __('Confirm Password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password_confirmation')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-8">
                <a class="text-sm" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
            <div class="col-4 text-right">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
            </div>
        </div>
    </form>
@endsection
