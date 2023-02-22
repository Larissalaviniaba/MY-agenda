<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="/css/style.css">
        <script src="https://unpkg.com/phosphor-icons"></script>

    </head>
    <body class="antialiased">
        @yield('content')
    </body>
    <script src=""></script>
    @yield('javascript')
</html>