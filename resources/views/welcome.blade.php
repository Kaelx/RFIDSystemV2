<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/">
                <b>{{ config('app.name', 'Laravel') }}</b>
            </a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Welcome to {{ config('app.name', 'Laravel') }}</p>
                @if (Route::has('login'))
                    <div class="mb-3">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-block mb-2">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-block mb-2">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary btn-block">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <hr>
                <div class="text-center">
                    <a href="https://laravel.com/docs" target="_blank">Laravel Documentation</a> |
                    <a href="https://laracasts.com" target="_blank">Laracasts</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- AdminLTE JS -->
    <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
