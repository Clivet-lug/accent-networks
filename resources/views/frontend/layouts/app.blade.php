<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- SEO Meta Tags --}}
    <title>@yield('title', 'Accent Networks Ltd - ICT Solutions in Zambia')</title>
    <meta name="description" content="@yield('description', 'Leading ICT solutions provider in Zambia. Telecommunications, Data Networks, CCTV, and Consultancy Services.')">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('public/favicon.ico') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    {{-- Favicon --}}
    {{-- <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}"> --}}

    {{-- Vite Assets (CSS & JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Additional Styles --}}
    @stack('styles')
</head>

<body class="font-sans antialiased bg-white text-accent-gray-dark">

    {{-- Header / Navigation --}}
    @include('frontend.partials.header')

    {{-- Main Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.partials.footer')

    {{-- WhatsApp Floating Button --}}
    @include('frontend.partials.whatsapp-button')

    {{-- Additional Scripts --}}
    @stack('scripts')

</body>

</html>
