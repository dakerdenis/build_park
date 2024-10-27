<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Dynamic Page Title -->
    <title>@yield('title', config('app.name', 'Build Park'))</title>

    <!-- Meta Descriptions and Keywords (Dynamic) -->
    <meta name="description" content="@yield('meta_description', 'Default meta description for Build Park')">
    <meta name="keywords" content="@yield('meta_keywords', 'construction, renovation, design, build park')">
    <meta name="author" content="Build Park Company">

    <!-- Open Graph / Facebook Meta Tags -->
    <meta property="og:title" content="@yield('og_title', config('app.name', 'Build Park'))">
    <meta property="og:description" content="@yield('og_description', 'Default description for Build Park on social media')">
    <meta property="og:image" content="{{ Vite::asset('resources/images/logo.png') }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'Build Park'))">
    <meta name="twitter:description" content="@yield('twitter_description', 'Default Twitter description for Build Park')">
    <meta name="twitter:image" content="{{ Vite::asset('resources/images/logo.png') }}">

    <!-- Favicon with Vite -->
    <link rel="icon" href="{{ Vite::asset('resources/images/logo.png') }}" type="image/png">

    <!-- Add CSS files -->
    @vite(['resources/css/style.css', 'resources/css/header.css', 'resources/js/app.js'])

    <!-- Allow additional page-specific styles -->
    @stack('styles')

    <!-- JSON-LD Structured Data for SEO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Build Park",
            "url": "{{ url('/') }}",
            "logo": "{{ Vite::asset('resources/images/logo.png') }}",
            "description": "Build Park offers a wide range of renovation, construction, and design services to meet your needs.",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+1-800-555-0199",
                "contactType": "Customer Service",
                "areaServed": "US",
                "availableLanguage": ["English", "Spanish"]
            }
        }
    </script>
</head>

<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Additional page-specific scripts -->
    @stack('scripts')
</body>

</html>
