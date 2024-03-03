<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
        <title>{{ (isset($title) ? $title . ' - ' : '') }} SalesBoard</title>
        @vite(['resources/sass/app.scss', 'resources/sass/dashboard.scss', 'resources/js/app.js'])
    </head>
    <body class="d-flex flex-column h-100">
    <livewire:partials.navbar />
    <div class="container">
        <main class="px-3 py-4 mt-4 rounded-2 bg-light">
            {{ $slot }}
        </main>
    </div>
    <footer class="text-center footer mt-auto py-3 bg-light font-monospace">Copyright © {{ date('Y') }} - Sales Board - All rights reserved.</footer>
    </body>
</html>
