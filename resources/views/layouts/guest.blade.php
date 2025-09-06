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
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-3xl overflow-hidden max-w-4xl w-full">
            <!-- Kiri: Form Login -->
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8">
                <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500 mb-4" />
                    </a>
                </div>
                <div class="w-full">
                    {{ $slot }}
                </div>
            </div>
            <!-- Kanan: Ilustrasi -->
            <div class="hidden md:flex w-1/2 items-center justify-center bg-blue-50">
                <img src="{{ asset('images/undraw_choose_5kz4.svg') }}" alt="Ilustrasi Login" class="w-4/5 h-auto">
            </div>
        </div>
    </div>
</body>
</html>