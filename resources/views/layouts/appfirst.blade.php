<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>

        .f-navbar {
            background-color: #3C8085;
            height: 4px;
            width: 100%;
        }
        .collapse {
            font-size: 15px;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div id="app">

        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>
</html>
