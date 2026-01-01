@extends('adminlte::auth.login')

@section('auth_body')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="row mt-4 align-items-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-danger">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
@endsection
