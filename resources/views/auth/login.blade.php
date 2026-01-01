@extends('adminlte::auth.login')

@section('auth_body')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="input-group mb-3">
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username" class="form-control @error('email') is-invalid @enderror"
                placeholder="{{ __('Email') }}">
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
            <input id="password" type="password" name="password" required autocomplete="current-password"
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

        <!-- Remember Me -->
        <div class="row mb-3">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">
                        {{ __('Remember me') }}
                    </label>
                </div>
            </div>
            <div class="col-4 text-right">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Log in') }}</button>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-right">
                @if (Route::has('password.request'))
                    <a class="text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
