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
    <livewire:partials.navbar :page="$title" />
    <div class="container">
        <main class="px-3 py-4 mt-4 rounded-2 bg-light">
            {{ $slot }}
        </main>

        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
        <x-livewire-alert::flash />
        <livewire:scripts />
        @livewireChartsScripts
    </div>
    <footer class="text-center footer mt-auto py-3 bg-light font-monospace">Copyright © {{ date('Y') }} - Sales Board - All rights reserved.</footer>
    </body>
</html>
