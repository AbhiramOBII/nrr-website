<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N. R. Ramesh - Results Over Rhetoric</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</head>
<body class="bg-bg-cream font-satoshi min-h-screen overflow-x-hidden">
    <!-- Top Bar -->
    <div class="bg-primary text-white py-2 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Contact Information -->
                <div class="flex flex-col space-y-1 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <div class="flex items-center space-x-1">
                        <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <span class="text-xs sm:text-sm truncate">+91 99458 01999</span>
                    </div>
                    <div class="flex items-center space-x-1">
                        <svg class="w-3 h-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span class="text-xs sm:text-sm truncate">contact@nrramesh.com</span>
                    </div>
                </div>
                
                <!-- Language Selection -->
                <div class="relative flex-shrink-0">
                    <button id="language-dropdown-btn" class="flex items-center space-x-1 hover:text-opacity-80 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50 rounded px-2 py-1 transition-colors duration-200" aria-haspopup="true" aria-expanded="false">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-4 0 2 2 0 00-1.668-1.973z" clip-rule="evenodd"/>
                        </svg>
                        <span id="selected-language" class="text-xs sm:text-sm">{{ app()->getLocale() === 'kn' ? 'ಕನ್ನಡ' : 'English' }}</span>
                        <svg class="w-3 h-3 transition-transform duration-200" id="language-dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    
                    <!-- Language Dropdown Menu -->
                    <div id="language-dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 hidden">
                        <div class="py-1" role="menu" aria-orientation="vertical">
                            <a href="{{ route('switch.language', 'en') }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ app()->getLocale() === 'en' ? 'bg-gray-100 font-semibold' : '' }}" role="menuitem">
                                <span class="mr-3">🇺🇸</span>
                                <span>English</span>
                                @if(app()->getLocale() === 'en')
                                    <svg class="ml-auto h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </a>
                            <a href="{{ route('switch.language', 'kn') }}" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ app()->getLocale() === 'kn' ? 'bg-gray-100 font-semibold' : '' }}" role="menuitem">
                                <span class="mr-3">🇮🇳</span>
                                <span>ಕನ್ನಡ (Kannada)</span>
                                @if(app()->getLocale() === 'kn')
                                    <svg class="ml-auto h-4 w-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Skip to main content link for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-primary text-white px-4 py-2 rounded-md z-50">
        {{ __('messages.skip_to_main') }}
    </a>

    <!-- Header -->
    <header class="bg-header-orange border-b border-dark-shade sticky top-0 z-40" role="banner">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <img src="{{ asset('image/bjp-logo.svg') }}" alt="N. R. Ramesh Logo" class="h-10 w-10 md:h-12 md:w-12 object-contain">
                            <h1 class="text-2xl md:text-3xl font-bold text-white">
                                {{ __('messages.name') }}
                            </h1>
                        </a>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:block" role="navigation" aria-label="Main navigation">
                    <ul class="flex items-center space-x-1">
                        <li class="relative group">
                            <a href="{{ route('about') }}" class="text-white font-semibold text-base hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent rounded-lg px-3 py-2 transition-all duration-300 hover:bg-white/10 relative whitespace-nowrap">
                                {{ __('messages.about') }}
                                <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('major-developments.public') }}" class="text-white font-semibold text-base hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent rounded-lg px-3 py-2 transition-all duration-300 hover:bg-white/10 flex items-center gap-1 relative whitespace-nowrap">
                                {{ __('messages.major_development') }}
                                <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-orange-400 transition-all duration-300 hover:w-full hover:left-0"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('scams-exposed.public') }}" class="text-white font-semibold text-base hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent rounded-lg px-3 py-2 transition-all duration-300 hover:bg-white/10 flex items-center gap-1 relative whitespace-nowrap">
                                {{ __('messages.scams_exposed') }}
                                <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-orange-400 transition-all duration-300 hover:w-full hover:left-0"></span>
                            </a>
                        </li>
                        <li class="relative group">
                            <button class="text-white font-semibold text-base hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent rounded-lg px-3 py-2 transition-all duration-300 hover:bg-white/10 flex items-center gap-1 relative whitespace-nowrap">
                                {{ __('messages.news_and_events') }}
                                <i class="fas fa-chevron-down w-3 h-3 transition-transform duration-300 group-hover:rotate-180"></i>
                                <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                            </button>
                            <!-- Enhanced Dropdown Menu -->
                            <div class="absolute top-full left-0 mt-3 w-48 bg-white rounded-xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-500 to-cyan-600 px-4 py-3">
                                    <h3 class="text-white font-semibold text-sm">{{ __('messages.media_coverage') }}</h3>
                                </div>
                                <div class="py-2">
                                    <a href="{{ route('events.index') }}" class="group/item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 transition-all duration-200">
                                        <i class="fas fa-calendar-alt w-4 h-4 mr-3 text-blue-500 group-hover/item:text-blue-700"></i>
                                        {{ __('messages.events') }}
                                    </a>
                                    <a href="{{ route('print-media.index') }}" class="group/item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 transition-all duration-200">
                                        <i class="fas fa-newspaper w-4 h-4 mr-3 text-blue-500 group-hover/item:text-blue-700"></i>
                                        {{ __('messages.print_media') }}
                                    </a>
                                    <a href="{{ route('photo-gallery.index') }}" class="group/item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 transition-all duration-200">
                                        <i class="fas fa-images w-4 h-4 mr-3 text-blue-500 group-hover/item:text-blue-700"></i>
                                        {{ __('messages.photo_gallery') }}
                                    </a>
                                    <a href="{{ route('electronic-media.index') }}" class="group/item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 transition-all duration-200">
                                        <i class="fab fa-youtube w-4 h-4 mr-3 text-blue-500 group-hover/item:text-blue-700"></i>
                                        {{ __('messages.electronic_media') }}
                                    </a>
                                    <a href="{{ route('official-media.index') }}" class="group/item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 transition-all duration-200">
                                        <i class="fas fa-bullhorn w-4 h-4 mr-3 text-blue-500 group-hover/item:text-blue-700"></i>
                                        {{ __('messages.official_media') }}
                                    </a>
                                    <a href="{{ route('blogs.index') }}" class="group/item flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-cyan-50 hover:text-blue-700 transition-all duration-200">
                                        <i class="fas fa-blog w-4 h-4 mr-3 text-blue-500 group-hover/item:text-blue-700"></i>
                                        {{ __('messages.blogs') }}
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="text-white font-semibold text-base hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent rounded-lg px-3 py-2 transition-all duration-300 hover:bg-white/10 relative group whitespace-nowrap">
                                {{ __('messages.contact') }}
                                <span class="absolute bottom-0 left-1/2 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full group-hover:left-0"></span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button type="button" class="text-white hover:text-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-offset-2 focus:ring-offset-transparent rounded-lg p-3 transition-all duration-300 hover:bg-white/10" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="menu-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="h-6 w-6 hidden transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" id="close-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Enhanced Mobile Navigation Menu -->
            <div class="md:hidden fixed inset-0 z-50 hidden" id="mobile-menu">
                <!-- Backdrop -->
                <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" id="mobile-backdrop"></div>
                
                <!-- Menu Panel -->
                <div class="fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out" id="mobile-panel">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-orange-500 to-red-600 px-6 py-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('image/bjp-logo.svg') }}" alt="N. R. Ramesh Logo" class="h-8 w-8 object-contain">
                            <h2 class="text-white font-bold text-lg">N. R. Ramesh</h2>
                        </div>
                        <button class="text-white hover:text-orange-200 p-2 rounded-lg transition-colors" id="mobile-close-btn">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Navigation Items -->
                    <div class="flex-1 overflow-y-auto py-6">
                        <!-- About -->
                        <div class="px-6 mb-2">
                            <a href="{{ route('about') }}" class="flex items-center justify-between py-3 text-gray-800 hover:text-orange-600 font-semibold text-lg transition-colors group">
                                {{ __('messages.about') }}
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Major Development -->
                        <div class="px-6 mb-2">
                            <button class="w-full flex items-center justify-between py-3 text-gray-800 hover:text-orange-600 font-semibold text-lg transition-colors group" onclick="toggleMobileSubmenu('development')">
                                {{ __('messages.major_development') }}
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-orange-600 transition-transform duration-200" id="development-arrow" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="hidden pl-4 pb-2 space-y-1" id="development-submenu">
                                @php
                                    $mobileDevelopments = \App\Models\MajorDevelopment::active()->ordered()->get();
                                @endphp
                                @forelse($mobileDevelopments as $dev)
                                <a href="{{ route('major-development.show', $dev->slug) }}" class="block py-2 px-3 text-sm text-gray-600 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">{{ $dev->title }}</a>
                                @empty
                                <p class="py-2 px-3 text-sm text-gray-500">No developments yet</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Scams Exposed -->
                        <div class="px-6 mb-2">
                            <a href="{{ route('scams-exposed.public') }}" class="block py-3 text-gray-800 hover:text-red-600 font-semibold text-lg transition-colors">
                                {{ __('messages.scams_exposed') }}
                            </a>
                        </div>

                        <!-- Media -->
                        <div class="px-6 mb-2">
                            <button class="w-full flex items-center justify-between py-3 text-gray-800 hover:text-blue-600 font-semibold text-lg transition-colors group" onclick="toggleMobileSubmenu('media')">
                                {{ __('messages.media') }}
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-transform duration-200" id="media-arrow" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div class="hidden pl-4 pb-2 space-y-1" id="media-submenu">
                                <a href="{{ route('events.index') }}" class="flex items-center py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-calendar-alt w-4 h-4 mr-2"></i>
                                    {{ __('messages.events') }}
                                </a>
                                <a href="{{ route('print-media.index') }}" class="flex items-center py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-newspaper w-4 h-4 mr-2"></i>
                                    {{ __('messages.print_media') }}
                                </a>
                                <a href="{{ route('photo-gallery.index') }}" class="flex items-center py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-images w-4 h-4 mr-2"></i>
                                    {{ __('messages.photo_gallery') }}
                                </a>
                                <a href="{{ route('electronic-media.index') }}" class="flex items-center py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fab fa-youtube w-4 h-4 mr-2"></i>
                                    {{ __('messages.electronic_media') }}
                                </a>
                                <a href="{{ route('official-media.index') }}" class="flex items-center py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-bullhorn w-4 h-4 mr-2"></i>
                                    {{ __('messages.official_media') }}
                                </a>
                                <a href="{{ route('blogs.index') }}" class="flex items-center py-2 px-3 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                    <i class="fas fa-blog w-4 h-4 mr-2"></i>
                                    {{ __('messages.blogs') }}
                                </a>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="px-6 mb-2">
                            <a href="{{ route('contact') }}" class="flex items-center justify-between py-3 text-gray-800 hover:text-orange-600 font-semibold text-lg transition-colors group">
                                {{ __('messages.contact') }}
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="border-t border-gray-200 px-6 py-4">
                        <div class="flex items-center justify-center space-x-4">
                            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-red-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Language Dropdown JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const languageDropdownBtn = document.getElementById('language-dropdown-btn');
            const languageDropdownMenu = document.getElementById('language-dropdown-menu');
            const languageDropdownArrow = document.getElementById('language-dropdown-arrow');

            if (languageDropdownBtn && languageDropdownMenu) {
                languageDropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isExpanded = languageDropdownBtn.getAttribute('aria-expanded') === 'true';
                    
                    languageDropdownBtn.setAttribute('aria-expanded', !isExpanded);
                    languageDropdownMenu.classList.toggle('hidden');
                    if (languageDropdownArrow) {
                        languageDropdownArrow.classList.toggle('rotate-180');
                    }
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!languageDropdownBtn.contains(event.target) && !languageDropdownMenu.contains(event.target)) {
                        languageDropdownMenu.classList.add('hidden');
                        languageDropdownBtn.setAttribute('aria-expanded', 'false');
                        if (languageDropdownArrow) {
                            languageDropdownArrow.classList.remove('rotate-180');
                        }
                    }
                });
            }
        });
    </script>