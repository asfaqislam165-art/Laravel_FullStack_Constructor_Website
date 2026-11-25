<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Apex Roofing Pro') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#142D4E] text-[#FFFFFF] font-sans antialiased selection:bg-[#F28C28] selection:text-[#142D4E] min-h-screen flex flex-col">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#142D4E] px-4">
            
            <!-- Optional Branded Heading or Logo replacement if needed -->
            <div class="mb-6 text-center">
                <a href="{{ route('home') }}" class="text-3xl font-black tracking-wider text-white inline-block">
                    APEX<span class="text-[#F28C28]">ROOFING</span>
                </a>
            </div>

            <!-- Form Card Wrapper with Brand Glassmorphism -->
            <div class="w-full sm:max-w-md px-6 py-8 bg-[#0f223a]/90 backdrop-blur-md shadow-2xl overflow-hidden sm:rounded-3xl border border-[#234878]">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>