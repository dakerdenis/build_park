<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Build Park') }}</title>
    <!-- Add any CSS files here -->

    @vite(['resources/css/style.css', 'resources/js/app.js'])

</head>

<body>


    <div id="app">
        @yield('content')
    </div>



    <!-- Additional page-specific scripts (if needed) -->
    @stack('scripts')
</body>

</html>
