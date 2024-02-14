<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <link rel="preload" as="style" href="/css/lib/toastify.min.css?v={{ config('app.version') }}" />
        <link rel="stylesheet" href="/css/lib/toastify.min.css?v={{ config('app.version') }}" />

        <link rel="preload" as="style" href="/css/global.css?v={{ config('app.version') }}" />
        <link rel="stylesheet" href="/css/global.css?v={{ config('app.version') }}" />
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen flex flex-col bg-gray-100">
            <div class="flex grow">
                <input type="checkbox" id="app-sidebar-checkbox" class="hidden" />
                <div id="app-sidebar-container" class="flex flex-col">
                    <label id="app-sidebar-overlay" for="app-sidebar-checkbox" class="transition-colors"></label>
                    <div id="app-sidebar" class="flex flex-col bg-white shadow-sm">
                        <div class="flex-none flex px-1 border-b justify-between h-12">
                            <span class="flex px-1 leading-tight truncate flex-col justify-center select-none">
                                <p class="truncate">{{ Auth::user()->name }}</p>
                                <small class="inline-block text-gray-600 truncate">{{ Auth::user()->email }}</small>
                            </span>
                            <div class="flex gap-1">
                                <label for="app-sidebar-checkbox" title="Toggle sidebar" class="app-sidebar-close-btn lg:hidden group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
                                    <span class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-gray-300 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M480-424 284-228q-11 11-28 11t-28-11q-11-11-11-28t11-28l196-196-196-196q-11-11-11-28t11-28q11-11 28-11t28 11l196 196 196-196q11-11 28-11t28 11q11 11 11 28t-11 28L536-480l196 196q11 11 11 28t-11 28q-11 11-28 11t-28-11L480-424Z"/></svg>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="grow overflow-y-auto app-scrollbar border-b">

                            <a href="{{ route('lab-tests.index') }}" class="{{ request()->routeIs('lab-tests.index') ? 'bg-primary text-white' : 'text-gray-600 hover:bg-gray-100' }} flex px-3 py-2 items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M402-402 143-507q-13-5-19-15.5t-6-21.5q0-11 6.5-21.5T144-581l614-228q12-5 23-2t19 11q8 8 11 19t-2 23L581-144q-5 13-15.5 19.5T544-118q-11 0-21.5-6T507-143L402-402Zm140 134 162-436-436 162 196 78 78 196Zm-78-196Z"/></svg>
                                <span>Lab Tests</span>
                            </a>
                            <a href="{{ route('lab-test-categories.index') }}" class="{{ request()->routeIs('lab-test-categories.index') ? 'bg-primary text-white' : 'text-gray-600 hover:bg-gray-100' }} flex px-3 py-2 items-center gap-2 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M402-402 143-507q-13-5-19-15.5t-6-21.5q0-11 6.5-21.5T144-581l614-228q12-5 23-2t19 11q8 8 11 19t-2 23L581-144q-5 13-15.5 19.5T544-118q-11 0-21.5-6T507-143L402-402Zm140 134 162-436-436 162 196 78 78 196Zm-78-196Z"/></svg>
                                <span>Lab Test Categories</span>
                            </a>

                        </div>
                        <div class="text-center py-1">
                            <a href="https://www.byvex.com" target="_blank" rel="noopener noreferrer nofollow" class="text-sm leading-none">Built with Byvex</a>
                        </div>
                    </div>
                </div>
                <div id="app-content" class="flex flex-col w-full">
                    @livewire('navigation-menu')
                    <main class="grow">{{ $slot }}</main>
                </div>
            </div>
        </div>
        @stack('modals')
        @livewireScripts
        <script defer src="/js/lib/toastify.min.js?v={{ config('app.version') }}"></script>
        <script defer src="/js/admin/global.js?v={{ config('app.version') }}"></script>
    </body>
</html>
