@extends('layouts.app')

@section('title', __('messages.about_title'))
@section('description', 'Learn about N. R. Ramesh - A dedicated public servant committed to transparency, accountability, and progressive governance in Karnataka.')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-[#3B7080] py-12 md:py-12">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.about_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.about_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Profile Section -->
    <section class="py-12 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="{{ asset('image/Hero-picture.jpg') }}" alt="N. R. Ramesh" class="w-full rounded-2xl shadow-2xl">
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary mb-6">
                        {{ __('messages.dedicated_serving') }}
                    </h2>
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <p>
                            {{ __('messages.profile_para_1') }}
                        </p>
                        <p>
                            {{ __('messages.profile_para_2') }}
                        </p>
                        <p>
                            {{ __('messages.profile_para_3') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-12 md:py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">{{ __('messages.vision_mission') }}</h2>
                <div class="w-20 h-1 bg-header-orange mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Vision -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="w-16 h-16 bg-primary rounded-xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ __('messages.our_vision') }}</h3>
                    <p class="text-gray-700 text-center leading-relaxed">
                        {{ __('messages.vision_text') }}
                    </p>
                </div>

                <!-- Mission -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="w-16 h-16 bg-header-orange rounded-xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ __('messages.our_mission') }}</h3>
                    <p class="text-gray-700 text-center leading-relaxed">
                        {{ __('messages.mission_text') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Focus Areas -->
    <section class="py-12 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">{{ __('messages.key_focus_areas') }}</h2>
                <div class="w-20 h-1 bg-header-orange mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Focus Area 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.anti_corruption') }}</h3>
                    <p class="text-gray-600">{{ __('messages.anti_corruption_desc') }}</p>
                </div>

                <!-- Focus Area 2 -->
                <div class="bg-gradient-to-br from-green-50 to-white rounded-xl p-6 border border-green-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.infrastructure') }}</h3>
                    <p class="text-gray-600">{{ __('messages.infrastructure_desc') }}</p>
                </div>

                <!-- Focus Area 3 -->
                <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl p-6 border border-purple-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.education') }}</h3>
                    <p class="text-gray-600">{{ __('messages.education_desc') }}</p>
                </div>

                <!-- Focus Area 4 -->
                <div class="bg-gradient-to-br from-red-50 to-white rounded-xl p-6 border border-red-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.healthcare') }}</h3>
                    <p class="text-gray-600">{{ __('messages.healthcare_desc') }}</p>
                </div>

                <!-- Focus Area 5 -->
                <div class="bg-gradient-to-br from-yellow-50 to-white rounded-xl p-6 border border-yellow-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.employment') }}</h3>
                    <p class="text-gray-600">{{ __('messages.employment_desc') }}</p>
                </div>

                <!-- Focus Area 6 -->
                <div class="bg-gradient-to-br from-indigo-50 to-white rounded-xl p-6 border border-indigo-100 hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('messages.social_welfare') }}</h3>
                    <p class="text-gray-600">{{ __('messages.social_welfare_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <!-- <section class="py-16 bg-gradient-to-r from-primary to-blue-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Join Us in Building a Better Tomorrow
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">
                Together, we can create a transparent, accountable, and progressive society. Your support and participation matter.
            </p>
            <a href="{{ route('contact') }}" class="inline-block bg-white text-primary px-8 py-4 rounded-lg font-semibold text-lg hover:bg-gray-100 transition-colors shadow-lg">
                Get in Touch
            </a>
        </div>
    </section> -->
</main>
@endsection
