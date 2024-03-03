<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <title>{{ $title ?? 'Page Title' }}</title>
        @vite(['resources/sass/app.scss', 'resources/sass/dashboard.scss', 'resources/js/app.js'])
    </head>
    <body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img width="200" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo-sales-board-white.png') }}" class="img-fluid" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container mt-4 rounded-2 bg-light">
        fdafadf
        {{ $slot }}
    </main>
    <footer class="text-center footer mt-auto py-3 bg-light">Copyright © {{ date('Y') }} - Sales Board - All rights reserved.</footer>
    </body>
</html>
