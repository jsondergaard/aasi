<!doctype html>
<html lang="da">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AASI</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    @vite(['resources/sass/app.scss'])
</head>

<body class="d-flex flex-column h-100">
    @include('layouts.partials.nav')
    <div class="container">
        <main class="flex-shrink-0" role="main" id="app">
            @yield('main')
        </main>
    </div>

    @include('layouts.partials.footer')

    @stack('scripts')
</body>

</html>
