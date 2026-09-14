<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StudentApp') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-navy antialiased bg-beige">
        <div class="min-h-screen flex flex-col justify-center items-center py-12 px-4 sm:px-6 lg:px-8 bg-beige">
            <div class="flex flex-col items-center mb-4">
                <a href="/" class="flex items-center space-x-3 group">
                    <div class="w-14 h-14 rounded-2xl bg-navy flex items-center justify-center text-white text-2xl shadow-lg group-hover:scale-105 transition-transform duration-200">
                        🎓
                    </div>
                </a>
                <h1 class="mt-3 text-2xl font-bold text-navy tracking-tight">Student App</h1>
                <p class="text-xs text-teal font-medium">Welcome back! Please enter your details.</p>
            </div>

            <div class="w-full sm:max-w-md bg-white shadow-xl rounded-2xl border border-skyblue/60 p-8">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
