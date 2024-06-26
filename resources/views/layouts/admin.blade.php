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
                        <div class="flex-none flex px-1 border-b justify-between h-14">
                            <span class="flex px-1 leading-tight truncate flex-col justify-center select-none">
                                <p class="truncate">{{ Auth::user()->name }}</p>
                                <small class="inline-block text-gray-600 truncate">{{ Auth::user()->email }}</small>
                            </span>
                            <div class="flex gap-1">
                                <label for="app-sidebar-checkbox" title="Toggle sidebar" class="app-sidebar-close-btn lg:hidden group inline-flex items-center justify-center cursor-pointer text-gray-600 hover:text-gray-900 transition-colors">
                                    <span class="w-11 h-11 inline-flex items-center justify-center rounded-full border border-gray-200 bg-gray-100 group-hover:bg-gray-300 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="currentColor" width="24" height="24" viewBox="0 -960 960 960"><path d="M480-424 284-228q-11 11-28 11t-28-11q-11-11-11-28t11-28l196-196-196-196q-11-11-11-28t11-28q11-11 28-11t28 11l196 196 196-196q11-11 28-11t28 11q11 11 11 28t-11 28L536-480l196 196q11 11 11 28t-11 28q-11 11-28 11t-28-11L480-424Z"/></svg>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="grow overflow-y-auto app-scrollbar border-b">
                            <x-sidebar.menu-item
                                active="{{ request()->routeIs('dashboard') }}"
                                href="{{ route('dashboard') }}">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
                                </x-slot>
                                Dashboard
                            </x-sidebar.menu-item>

                            <x-sidebar.menu-item
                                active="{{ request()->routeIs('profile.show') }}"
                                href="{{ route('profile.show') }}">
                                <x-slot name="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/></svg>
                                </x-slot>
                                Profile
                            </x-sidebar.menu-item>

                            @if( auth()->user()->isSuperAdmin() || auth()->user()->isAdmin() || auth()->user()->isDoctor() )
                                <div class="border-b" x-data="{open: {{ (request()->routeIs('lab-items.index') || request()->routeIs('lab-item-categories.index')) ? 'true' : 'false' }} }">
                                    <a href="#!" @click.prevent="open = !open" class="{{ (request()->routeIs('lab-items.index') || request()->routeIs('lab-item-categories.index')) ? 'text-primary bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 items-center gap-2 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M200-120q-51 0-72.5-45.5T138-250l222-270v-240h-40q-17 0-28.5-11.5T280-800q0-17 11.5-28.5T320-840h320q17 0 28.5 11.5T680-800q0 17-11.5 28.5T640-760h-40v240l222 270q32 39 10.5 84.5T760-120H200Zm80-120h400L544-400H416L280-240Zm-80 40h560L520-492v-268h-80v268L200-200Zm280-280Z"/></svg>
                                        <span>Lab Items</span>
                                    </a>
                                    <div class="relative overflow-hidden transition-all max-h-0" x-ref="container" x-bind:style="open ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''">
                                        <a href="{{ route('lab-items.index') }}" class="{{ request()->routeIs('lab-items.index') ? 'bg-primary-100 text-primary' : 'text-gray-600 hover:bg-gray-100' }} block w-full pl-9 pr-3 py-1 font-medium text-sm">View All</a>
                                        <a href="{{ route('lab-item-categories.index') }}" class="{{ request()->routeIs('lab-item-categories.index') ? 'bg-primary-100 text-primary' : 'text-gray-600 hover:bg-gray-100' }} block w-full pl-9 pr-3 py-1 font-medium text-sm">Categories</a>
                                    </div>
                                </div>

                                <div class="border-b" x-data="{open: {{ (request()->routeIs('lab-tests.index') || request()->routeIs('lab-test-categories.index')) ? 'true' : 'false' }} }">
                                    <a href="#!" @click.prevent="open = !open" class="{{ (request()->routeIs('lab-tests.index') || request()->routeIs('lab-test-categories.index')) ? 'text-primary bg-primary-50' : 'text-gray-600 hover:bg-gray-100' }} flex px-2 py-2 items-center gap-2 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M360-280q-17 0-28.5-11.5T320-320q0-17 11.5-28.5T360-360h40q17 0 28.5 11.5T440-320q0 17-11.5 28.5T400-280h-40ZM320-80q-83 0-141.5-58.5T120-280v-360q-33 0-56.5-23.5T40-720v-80q0-33 23.5-56.5T120-880h400q33 0 56.5 23.5T600-800v80q0 33-23.5 56.5T520-640v120q0 33-23.5 56.5T440-440h-80q-17 0-28.5-11.5T320-480q0-17 11.5-28.5T360-520h80v-120H200v360q0 50 35 85t85 35q18 0 34.5-5t30.5-14q13-8 28-4t23 18q9 14 5 30.5T423-109q-23 14-48.5 21.5T320-80ZM120-720h400v-80H120v80Zm540 520q42 0 71-29t29-71q0-42-29-71t-71-29q-42 0-71 29t-29 71q0 42 29 71t71 29Zm0 80q-75 0-127.5-52.5T480-300q0-75 52.5-127.5T660-480q75 0 127.5 52.5T840-300q0 26-7 50t-21 46l80 80q11 11 11 28t-11 28q-11 11-28 11t-28-11l-80-80q-22 14-46 21t-50 7ZM120-720v-80 80Z"/></svg>
                                        <span>Lab Tests</span>
                                    </a>
                                    <div class="relative overflow-hidden transition-all max-h-0" x-ref="container" x-bind:style="open ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''">
                                        <a href="{{ route('lab-tests.index') }}" class="{{ request()->routeIs('lab-tests.index') ? 'bg-primary-100 text-primary' : 'text-gray-600 hover:bg-gray-100' }} block w-full pl-9 pr-3 py-1 font-medium text-sm">View All</a>
                                        <a href="{{ route('lab-test-categories.index') }}" class="{{ request()->routeIs('lab-test-categories.index') ? 'bg-primary-100 text-primary' : 'text-gray-600 hover:bg-gray-100' }} block w-full pl-9 pr-3 py-1 font-medium text-sm">Categories</a>
                                    </div>
                                </div>

                                <x-sidebar.menu-item
                                    active="{{ request()->routeIs('users.index') }}"
                                    href="{{ route('users.index') }}">
                                    <x-slot name="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-5 h-5" width="24" height="24" viewBox="0 -960 960 960"><path d="M540-80q-108 0-184-76t-76-184v-23q-86-14-143-80.5T80-600v-240h120v-40h80v160h-80v-40h-40v160q0 66 47 113t113 47q66 0 113-47t47-113v-160h-40v40h-80v-160h80v40h120v240q0 90-57 156.5T360-363v23q0 75 52.5 127.5T540-160q75 0 127.5-52.5T720-340v-67q-35-12-57.5-43T640-520q0-50 35-85t85-35q50 0 85 35t35 85q0 39-22.5 70T800-407v67q0 108-76 184T540-80Zm220-400q17 0 28.5-11.5T800-520q0-17-11.5-28.5T760-560q-17 0-28.5 11.5T720-520q0 17 11.5 28.5T760-480Zm0-40Z"/></svg>
                                    </x-slot>
                                    Staff Members
                                </x-sidebar.menu-item>
                            @endif

                        </div>
                        <div class="text-center py-1">
                            <a href="https://www.example.com" target="_blank" rel="noopener noreferrer nofollow" class="text-sm leading-none">Built with Labs Team</a>
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
