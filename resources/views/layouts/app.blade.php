<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'N. R. Ramesh - Results Over Rhetoric')</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'N. R. Ramesh - Dedicated public servant committed to transparency, accountability, and progressive governance.')">
    <meta name="keywords" content="@yield('keywords', 'N R Ramesh, BJP, Karnataka, Politics, Development, Transparency, Governance')">
    <meta name="author" content="N. R. Ramesh">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'N. R. Ramesh - Results Over Rhetoric')">
    <meta property="og:description" content="@yield('og_description', 'Dedicated public servant committed to transparency, accountability, and progressive governance.')">
    <meta property="og:image" content="@yield('og_image', asset('image/bjp-logo.svg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'N. R. Ramesh - Results Over Rhetoric')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Dedicated public servant committed to transparency, accountability, and progressive governance.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('image/bjp-logo.svg'))">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('image/bjp-logo.svg') }}" alt="N. R. Ramesh Logo">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('image/apple-touch-icon.png') }}">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Satoshi:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Apply Baloo Tamma font to Kannada text */
        html[lang="kn"] body {
            font-family: 'Baloo Tamma 2', 'Satoshi', sans-serif;
        }
        
        /* Reduce font size for Kannada in header navigation */
        html[lang="kn"] header nav a,
        html[lang="kn"] header nav button {
            font-size: 0.875rem !important; /* 14px instead of 16px */
        }
        
        /* Adjust logo text size for Kannada */
        html[lang="kn"] header h1 {
            font-size: 1.5rem !important; /* Smaller than default */
        }
        
        @media (min-width: 768px) {
            html[lang="kn"] header h1 {
                font-size: 1.875rem !important; /* Smaller than default */
            }
        }
        
        /* Adjust dropdown menu text for Kannada */
        html[lang="kn"] .group-hover\:opacity-100 h3,
        html[lang="kn"] .group-hover\:opacity-100 a {
            font-size: 0.8125rem !important; /* 13px */
        }
    </style>
    
    <!-- Additional Head Content -->
    @stack('head')
</head>
<body class="bg-bg-cream font-satoshi min-h-screen overflow-x-hidden">

@include('layouts.header')

<!-- Main Content -->
<main id="main-content" class="flex-1">
    @yield('content')
</main>

@include('layouts.footer')

<!-- Additional Scripts -->
@stack('scripts')

</body>
</html>