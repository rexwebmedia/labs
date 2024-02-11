<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UjjaIndia Labs') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;800&display=swap" />
    <link rel="stylesheet" media="print" onload="this.onload = null; this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;800&display=swap" />
</head>

<body class="font-sans antialiased">
    <header class="sticky top-0 w-full shadow bg-white">
        <div class="xl:container flex flex-row justify-between px-1">
            <a title="Bookify" class="flex-none flex flex-row items-center gap-2 px-1 py-1 text-xl leading-tight truncate select-none focus:outline focus:outline-blue-500" href="/">
                <picture class="block w-12 overflow-hidden rounded-md h-auto">
                    <img alt="logo" src="/img/logo.png" class="w-full h-auto" width="48" height="48" />
                </picture>
                <div class="flex flex-col h-full justify-center truncate">
                    <div class="truncate font-bold leading-tight text-gray-800">Labify</div><small class="block font-semibold truncate">UjjaIndia Labs</small>
                </div>
            </a>
            <div class="flex gap-1">
                @guest
                    <a href="{{ route('login') }}" title="Login" class="inline-flex px-3 gap-3 items-center focus:outline focus:outline-blue-500 leading-tight bg-blue-500 text-white">
                        <span class="inline-flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
                        </span>
                        <span class="hidden sm:inline-flex flex-col justify-center">
                            <small>Login to account</small>
                            <span>Manage Bookings</span>
                        </span>
                    </a>
                    <a href="{{ route('register') }}" title="Register" class="inline-flex px-3 gap-3 items-center focus:outline focus:outline-blue-500 leading-tight bg-blue-500 text-white">
                        <span class="inline-flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
                        </span>
                    </a>
                @endguest
                @auth
                    <a href="{{ route('dashboard') }}" title="Dashboard" class="inline-flex px-3 gap-3 items-center focus:outline focus:outline-blue-500 leading-tight bg-blue-500 text-white">
                        <span class="inline-flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/></svg>
                        </span>
                        <span class="hidden sm:inline-flex flex-col justify-center">
                            <small>Dashboard</small>
                            <span>Manage Bookings</span>
                        </span>
                    </a>
                @endauth
            </div>
        </div>
    </header>
    <div class="min-h-screen bg-gray-50">
        <main>{{ $slot }}</main>
    </div>
    @if( isset($scripts) ) {{ $scripts }} @endif
    <script defer src="/js/lib/alpine.min.js?v=3.13.5"></script>
</body>
