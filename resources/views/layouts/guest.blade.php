<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Golden Gate College') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-ground">
        <div class="min-h-screen flex flex-wrap sm:justify-center pt-6 sm:pt-0 bg-ground">

            <div class="flex-1 bg-green flex flex-col justify-center items-center p-2">
                <div class="header-title uppercase text-white">
                    <h1 class="text-3xl text-center md:text-start md:text-6xl mb-2">Welcome To</h1>
                    <span class="text-xl md:text-3xl">Student Portal <span class="text-orange">Goldenian</span></span>
                </div>
                <div class="image w-[200px] md:w-[400px]">
                    <img src="{{ asset('img/book.png') }}" alt="" srcset="">
                </div>
            </div>

            <div class="flex-1 p-5 flex flex-col justify-center items-center">
                <div id="logo-container" class="uppercase font-sans flex justify-center p-2 items-center gap-2 tracking-wider">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    <span class="text-2xl">Golden Gate Colleges</span>
                </div>
               
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-light shadow-md overflow-hidden rounded-3xl">
                    {{ $slot }}
               </div>
            </div>

            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}\]
                 
            </div> --}}
        </div>
    </body>
</html>
