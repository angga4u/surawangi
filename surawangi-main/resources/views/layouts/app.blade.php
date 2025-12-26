<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    @hasSection('description')
        <meta property="og:description" content="@yield('description')">
        <meta name="description" content="@yield('description')">
    @endif

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/logo.png') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" sizes="16x16">
<link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}" sizes="32x32">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta property="og:title" content="@yield('title') - {{ config('app.name') }}">
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    @stack('styles')
</head>

<body class="antialiased font-sans">
    @yield('content')

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.14.9/cdn.min.js"
        integrity="sha512-KSdieUYxSxr/laB3Bh5TP8GAng49b2qRfdcnFvh8OuPpPgksA189OQ9v1A3gIz5P9s3A4aXMe5uiHLMfla60Uw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script defer>
        const notyf = new Notyf({
            duration: 2000,
            position: {
                x: 'right',
                y: 'top',
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
