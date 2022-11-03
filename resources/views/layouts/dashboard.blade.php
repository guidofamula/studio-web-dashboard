<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        {{ config('app.name') }} - @yield('title')
    </title>
    <!-- my-dashboard -->
    <link rel="stylesheet" href="{{ asset('vendor/my-dashboard/css/dashboard.css') }}">
    <!-- fontawesome -->
    {{-- <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- icon flag -->
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">

    <!-- CSS External -->
    @stack('css-external')

    <!-- CSS Internal -->
    @stack('css-internal')

</head>

<body>
    <!-- begin:navbar -->
    @include('layouts._dashboard.navbar')
    <!-- end:navbar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- begin:sidebar -->
            @include('layouts._dashboard.sidebar')
            <!-- end:sidebar -->
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h2 class="mt-2">
                        <!-- title -->
                        @yield('title')
                    </h2>
                    <!-- begin:breadcrumbs -->
                    @yield('breadcrumbs')
                    <!-- end:breadcrumbs -->

                    <!-- begin:content -->
                    @yield('content')
                    <!-- end:content -->
                </div>
            </main>
            <!-- begin:footer -->
            @include('layouts._dashboard.footer')
            <!-- end:footer -->
        </div>
    </div>
    <!-- scripts -->
    <!-- jquery -->
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- bootstrap bundle -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- my-dashboard -->
    <script src="{{ asset('vendor/my-dashboard/js/dashboard.js') }}"></script>
    <!-- Script Fontawesome -->
    <script src="{{ asset('vendor/fontawesome-free/js/all.min.js') }}"></script>
    <!-- Script Sweetalert -->
    @include('sweetalert::alert')
    <!-- JS external -->
    @stack('js-external')

    <!-- JS internal -->
    @stack('js-internal')

</body>

</html>
