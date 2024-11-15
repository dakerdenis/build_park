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
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', config('app.name', 'Build Park'))">
    <meta name="twitter:description" content="@yield('twitter_description', 'Default Twitter description for Build Park')">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Main CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <!-- Page-specific styles -->
    @stack('styles')

    <!-- JSON-LD Structured Data for SEO -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Build Park",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('images/logo.png') }}",
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

    <!-- Main JavaScript File -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Additional page-specific scripts -->
    @stack('scripts')
</body>

</html>
