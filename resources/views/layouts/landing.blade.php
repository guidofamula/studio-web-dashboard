<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description')">
    <title>@yield('title') | {{ config('app.name') }}</title>

    <!-- fontawesome free -->
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>

    <!-- Tailwind -->
    @vite('resources/css/app.css')

</head>

<body>
    {{-- Navbar Start --}}
    {{-- @include('layouts.partials-landing.navbar') --}}
    {{-- Navbar End --}}

    {{-- Content Start --}}
    @yield('content')
    {{-- Content End --}}

    {{-- Footer start --}}
    @include('layouts.partials-landing.footer')
    {{-- Footer end --}}

    <!-- SCRIPT tailwind -->
    {{-- @vite('resources/js/nav-toggle.js') --}}
    {{-- Script hamburger --}}
    <script type="text/javascript" src="/assets/js/scripts.js"></script>
</body>

</html>
