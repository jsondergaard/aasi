<!doctype html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <meta name="theme-color" content="#0b152a">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AASI – Admin</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Stylesheets -->
    @stack('stylesheets')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column h-100">
    @include('admin.layouts.partials.nav')

    @yield('main')

    @stack('scripts')
</body>

</html>
