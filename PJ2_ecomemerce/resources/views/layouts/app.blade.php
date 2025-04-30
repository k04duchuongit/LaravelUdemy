{{-- <!DOCTYPE html>
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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Document</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">


</head>

<body>


    <!--============================
        MENU START
    =============================-->
    @include('layouts.navbar')
    <!--============================
        MENU END
    =============================-->


    <!--============================
        PRODUCT START
    =============================-->
    {{ $slot }}
    <!--============================
        PRODUCT END
    =============================-->


    <!--============================
        FOOTER START
    =============================-->
    @include('layouts.footer')
    <!--============================
        FOOTER END
    =============================-->

    <!-- plugins js -->
    <script src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <!-- jQuery library -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Font Awesome -->
    <script src="{{ asset('assets/js/Font-Awesome.js') }}"></script>

    <!-- Main / Custom JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/select2.min.js') }}"></script>

   <!--main/custom js-->
   <script src="js/main.js"></script>



    <!-- stack xếp tất cả ma js của file con vào đúng vị trí -->
    @stack('scripts')

</body>

</html>
