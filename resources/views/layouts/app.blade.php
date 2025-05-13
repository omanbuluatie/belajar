<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <!-- Title -->
    <title>@yield('title')</title>
    

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/tpl/assets/images/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('/tpl') }}/assets/libs/flatpickr/dist/flatpickr.min.css" />
    <!-- darkmode js -->
    <script src="{{ asset('/tpl') }}/assets/js/vendors/darkMode.js"></script>

    <!-- Libs CSS -->
    <link href="{{ asset('/tpl') }}/assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="{{ asset('/tpl') }}/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="{{ asset('/tpl') }}/assets/libs/simplebar/dist/simplebar.min.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('/tpl') }}/assets/css/theme.min.css">
    <!-- Fonts & Styles -->



    <!-- Scripts -->
    <script src="{{ asset('/tpl/assets/js/vendors/darkMode.js') }}"></script>
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Page Content -->
        <main id="page-content">
            <div class="header">
                @include('layouts.header')
            </div>

            <!-- Content -->
            <div class="container-fluid py-4">
                {{ $slot }}
            </div>
        </main>
    </div>

    <!-- Libs JS -->
    <script src="{{ asset('/tpl') }}/assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="{{ asset('/tpl') }}/assets/js/theme.min.js"></script>
    <script src="{{ asset('js') }}/jquery.min.js"></script>

    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/') }}/dataTables.responsive.min.js"></script>
    <script src="{{ asset('js/') }}/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('/tpl') }}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/js/vendors/chart.js"></script>
    <script src="{{ asset('/tpl') }}/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="{{ asset('/tpl') }}/assets/js/vendors/flatpickr.js"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
