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

        {{-- font awesome --}}
        <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome"
            href="/css/app-wa-462d1fe84b879d730fe2180b0e0354e0.css?vsn=d">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">

        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4/animate.min.css"> --}}
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">

        <style>
            /* Hide the default scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
                background: #3be975;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
                background: #2b302e;
                cursor: pointer;
            }
        </style>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @if (Auth::user()->role === 'admin')
                @include('layouts.admin-navigation')
            @elseif (Auth::user()->role === 'dean')
                @include('layouts.dean-navigation')
            @elseif (Auth::user()->role === 'student')
                @include('layouts.student-navigation')
            @endif
            

            <!-- Page Heading -->
            {{-- @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

            <!-- Page Content -->
            <main>
                <!-- Content -->
                <div class="w-full pt-2 sm:px-6 lg:ps-52">
                    <!-- your content goes here ... -->
                    {{ $slot }}
                </div>
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('scripts')
    </body>
</html>
