@extends('adminlte::auth.login')

@section('auth_body')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

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

        <div class="row mb-0">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Confirm') }}</button>
            </div>
        </div>
    </form>
@endsection
