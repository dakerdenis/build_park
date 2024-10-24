<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Build Park') }}</title>
    <!-- Add any CSS files here -->

    <!-- Include your CSS using Vite -->
    @vite(['resources/css/app.css', 'resources/css/style.css'])
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>
