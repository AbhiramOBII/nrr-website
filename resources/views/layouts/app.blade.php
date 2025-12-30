<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">
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
    
    <!-- Additional Head Content -->
    @stack('head')
</head>

@include('layouts.header')

<!-- Main Content -->
<main id="main-content" class="flex-1">
    @yield('content')
</main>

@include('layouts.footer')

<!-- Additional Scripts -->
@stack('scripts')