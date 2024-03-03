<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>{{ $title ?? 'Login - Trial Bycoders_' }}</title>
    @vite(['resources/sass/app.scss', 'resources/sass/login.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-login">
        {{ $slot }}
    </div>
</body>
</html>
