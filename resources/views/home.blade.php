@extends('layouts.app')

@section('title', 'Home - N. R. Ramesh')
@section('description', 'Welcome to N. R. Ramesh official website')

@section('content')
        <!-- Hero Slider Section -->
        <section class="relative" aria-labelledby="slider-heading">
            <div class="slider-container relative w-full min-h-[570px] overflow-hidden">
                @if($sliders->count() > 0)
                    <!-- Slide Track -->
                    <div class="slider-track flex transition-transform duration-700 ease-in-out" id="slider-track">
                        @foreach($sliders as $index => $slider)
                            <div class="slide w-full flex-shrink-0 relative">
                                @if($slider->media)
                                <img src="{{ $slider->media->url }}" alt="{{ $slider->title }}" class="w-full h-[570px] object-cover">
                                @else
                                <img src="{{ asset('storage/sliders/' . $slider->image) }}" alt="{{ $slider->title }}" class="w-full h-[570px] object-cover">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-r from-primary/60 to-header-orange/40"></div>
                                <div class="absolute inset-0 flex items-center">
                                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                        <div class="text-left text-white max-w-2xl">
                                            <h{{ $index === 0 ? '1' : '2' }} {{ $index === 0 ? 'id="slider-heading"' : '' }} class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                                                {{ $slider->title }}
                                            </h{{ $index === 0 ? '1' : '2' }}>
                                            <p class="text-lg md:text-xl lg:text-2xl mb-8 leading-relaxed">
                                                {{ $slider->paragraph }}
                                            </p>
                                            @if($slider->button_text)
                                            <div class="flex flex-col sm:flex-row gap-4 items-start">
                                                <a href="{{ $slider->button_link }}" class="bg-white text-primary px-8 py-4 rounded-lg font-semibold text-lg hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50 transition-all duration-200 transform hover:scale-105 w-full sm:w-auto text-center">
                                                    {{ $slider->button_text }}
                                                </a>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($sliders->count() > 1)
                        <!-- Navigation Dots -->
                        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3">
                            @foreach($sliders as $index => $slider)
                                <button class="slider-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 focus:outline-none focus:bg-opacity-100 transition-all duration-200 {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}" aria-label="Go to slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>

                        <!-- Navigation Arrows -->
                        <button class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50 transition-all duration-200" id="prevSlide" aria-label="Previous slide">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-3 rounded-full focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50 transition-all duration-200" id="nextSlide" aria-label="Next slide">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    @endif
                @else
                    <!-- Default/Fallback Content when no sliders exist -->
                    <div class="slide w-full flex-shrink-0 relative">
                        <div class="w-full h-[570px] bg-gradient-to-r from-primary to-header-orange"></div>
                        <div class="absolute inset-0 flex items-center">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                <div class="text-center text-white">
                                    <h1 id="slider-heading" class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                                        {{ __('messages.hero_welcome') }}
                                    </h1>
                                    <p class="text-lg md:text-xl lg:text-2xl mb-8 leading-relaxed">
                                        {{ __('messages.hero_subtitle') }}
                                    </p>
                                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                                        <button class="bg-white text-primary px-8 py-4 rounded-lg font-semibold text-lg hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-white focus:ring-opacity-50 transition-all duration-200 transform hover:scale-105 w-full sm:w-auto">
                                            {{ __('messages.learn_more') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- About N.R. Ramesh Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <!-- Image Column (5/12) -->
                    <div class="lg:col-span-5">
                        <div>
                            <div class="text-4xl font-bold mb-6">{{ __('messages.name') }}</div>
                        </div>
                        <div>
                            <div class="w-20 h-1 bg-header-orange mb-6"></div>
                        </div>
                        <div class="relative">
                            <img src="image/Hero-picture.jpg" alt="N. R. Ramesh Portrait" class="w-full h-auto rounded-lg shadow-lg object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/20 to-transparent rounded-lg"></div>
                        </div>
                    </div>
                    
                    <!-- Content Column (7/12) -->
                    <div class="lg:col-span-7">
                        <div class="space-y-6">
                        
                            
                            <div class="space-y-4 text-primary">
                                <p class="leading-loose" style="font-size: 18px;">
                                    {!! __('messages.about_intro') !!}
                                    <br><br>
                                    {!! __('messages.about_intro_2') !!}
                                </p>
                            </div>

                            <!-- Call to Action -->
                            <div class="flex flex-col sm:flex-row gap-4 mt-8">
                                <!-- <button class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50 transition-all duration-200 transform hover:scale-105">
                                    {{ __('messages.learn_more_vision') }}
                                </button> -->
                                <button class="bg-transparent border-2 border-primary text-primary px-6 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white focus:outline-none focus:ring-4 focus:ring-primary focus:ring-opacity-50 transition-all duration-200">
                                    <a href="{{ route('major-developments.public') }}">{{ __('messages.view_achievements') }}</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




            <!-- Impact Counter Section -->
            <section class="py-16 relative overflow-hidden"  style="background-color: #e7dadaff;">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full translate-x-32 -translate-y-32"></div>
                    <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary rounded-full -translate-x-32 translate-y-32"></div>
                </div>
                
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                    <div class="text-left mb-12">
                        <h2 class="text-3xl md:text-3xl lg:text-3xl font-bold text-primary mb-4">
                            {{ __('messages.impact_by_numbers') }}
                        </h2>
                        <p class="text-primary/80 text-lg md:text-xl max-w-3xl">
                            {{ __('messages.impact_subtitle') }}
                        </p>
                        <div class="w-20 h-1 bg-header-orange mt-6"></div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Counter 1: Scams Exposed -->
                        <div class="text-center group">
                            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                                <div class="mb-4">
                                    <i class="fi fi-rr-shield-check text-5xl text-header-orange mb-4"></i>
                                </div>
                                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">
                                    <span class="counter" data-target="137">0</span>
                                </div>
                                <h3 class="text-lg font-semibold text-primary mb-2">{{ __('messages.scams_exposed_count') }}</h3>
                                <p class="text-primary/70 text-sm">{{ __('messages.scams_exposed_desc') }}</p>
                            </div>
                        </div>
    
                        <!-- Counter 2: Land Reclaimed -->
                        <div class="text-center group">
                            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                                <div class="mb-4">
                                    <i class="fi fi-rr-indian-rupee-sign text-5xl text-header-orange mb-4"></i>
                                </div>
                                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">
                                    ₹<span class="counter" data-target="11000">0</span>+
                                </div>
                                <h3 class="text-lg font-semibold text-primary mb-2">{{ __('messages.crore_reclaimed') }}</h3>
                                <p class="text-primary/70 text-sm">{{ __('messages.crore_reclaimed_desc') }}</p>
                            </div>
                        </div>
    
                        <!-- Counter 3: Revenue Leakages -->
                        <div class="text-center group">
                            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                                <div class="mb-4">
                                    <i class="fi fi-rr-chart-histogram text-5xl text-header-orange mb-4"></i>
                                </div>
                                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">
                                    ₹<span class="counter" data-target="4500">0</span>Cr
                                </div>
                                <h3 class="text-lg font-semibold text-primary mb-2">{{ __('messages.revenue_stopped') }}</h3>
                                <p class="text-primary/70 text-sm">{{ __('messages.revenue_stopped_desc') }}</p>
                            </div>
                        </div>
    
                        <!-- Counter 4: PILs Filed -->
                        <div class="text-center group">
                            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                                <div class="mb-4">
                                    <i class="fi fi-rr-document text-5xl text-header-orange mb-4"></i>
                                </div>
                                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">
                                    <span class="counter" data-target="59">0</span>
                                </div>
                                <h3 class="text-lg font-semibold text-primary mb-2">{{ __('messages.pils_filed') }}</h3>
                                <p class="text-primary/70 text-sm">{{ __('messages.pils_filed_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <!-- YouTube Videos Carousel Section -->
        <section class="py-16 bg-gray-50" style="background-color: #ffffffff; background-image: radial-gradient(circle at 2px 2px, rgba(225, 202, 202, 0.15) 2px, transparent 0); background-size: 20px 20px;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-left mb-12">
                    <h2 class="text-3xl md:text-3xl lg:text-3xl font-bold text-primary mb-4">
                        {{ __('messages.electronic_media') }}
                    </h2>
                    <p class="text-primary/80 text-lg md:text-xl max-w-3xl">
                        {{ __('messages.watch_videos') }}
                    </p>
                    <div class="w-20 h-1 bg-header-orange mt-6"></div>
                </div>

                <!-- Video Carousel -->
                @if($electronicMedia->count() > 0)
                <div class="relative">
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out" id="video-carousel">
                            @foreach($electronicMedia as $video)
                            <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-3">
                                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                                    <div class="relative group cursor-pointer" onclick="openVideo('{{ $video->video_id }}')">
                                        <div class="aspect-video bg-gray-200 overflow-hidden">
                                            <img src="{{ $video->thumbnail_url }}" 
                                                 alt="{{ $video->title }}" 
                                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                                    <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M8 5v14l11-7z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <h3 class="text-lg font-bold text-primary mb-2 line-clamp-2">
                                            {{ $video->title }}
                                        </h3>
                                        <p class="text-sm text-primary/80 line-clamp-3">
                                            {{ $video->short_description ?? Str::limit($video->description, 120) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @if($electronicMedia->count() > 1)
                    <!-- Navigation Buttons -->
                    <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-primary p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 z-10" 
                            onclick="scrollVideoCarousel(-1)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-primary p-3 rounded-full shadow-lg transition-all duration-300 hover:scale-110 z-10" 
                            onclick="scrollVideoCarousel(1)">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    @endif
                </div>

                <!-- View All Videos Button -->
                <div class="text-center mt-12">
                    <a href="{{ route('electronic-media.index') }}" class="inline-flex items-center px-8 py-4 bg-primary text-white font-semibold rounded-lg hover:bg-primary/90 transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        {{ __('messages.view_all_videos') }}
                    </a>
                </div>
                @else
                <div class="text-center py-12">
                    <p class="text-gray-500">{{ __('messages.no_videos') }}</p>
                </div>
                @endif
            </div>
        </section>

        <!-- Paper Clips Carousel Section -->
        <section class="py-16 bg-gray-50" style="background-color: #e7dadaff; background-image: radial-gradient(circle at 2px 2px, rgba(222, 149, 149, 0.15) 2px, transparent 0); background-size: 20px 20px;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-left mb-12">
                    <h2 class="text-3xl md:text-3xl lg:text-3xl font-bold text-primary mb-4">
                        {{ __('messages.print_media_section') }}
                    </h2>
                    <p class="text-primary/80 text-lg md:text-xl max-w-3xl">
                        {{ __('messages.news_clippings') }}
                    </p>
                    <div class="w-20 h-1 bg-header-orange mt-6"></div>
                </div>

                <!-- Modern News Grid Layout -->
                @if($printMedia->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($printMedia as $item)
                    <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden group cursor-pointer border border-gray-100" onclick="openLightbox('{{ $item->media->url }}', '{{ addslashes($item->title) }}')">
                        <div class="relative overflow-hidden">
                            <img src="{{ $item->media->url }}" 
                                 alt="{{ $item->title }}" 
                                 class="w-full h-[200px] object-contain group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-3">
                                @if($item->published_date)
                                <span class="text-gray-400 text-sm">{{ $item->published_date->format('M d, Y') }}</span>
                                @endif
                                <button class="ml-auto text-gray-400 hover:text-gray-600 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                    </svg>
                                </button>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-primary transition-colors">
                                {{ $item->title }}
                            </h2>
                            <div class="flex items-center justify-end">
                                <span class="text-primary text-sm font-medium group-hover:underline">{{ __('messages.view') }} →</span>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>

                <!-- View All Button -->
                <div class="text-center mt-12">
                    <a href="{{ route('print-media.index') }}" class="inline-block bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary/20">
                        {{ __('messages.view_all_press') }}
                    </a>
                </div>
                @else
                <div class="text-center py-12">
                    <p class="text-gray-500">{{ __('messages.no_print_media') }}</p>
                </div>
                @endif
            </div>
        </section>

            

        <!-- Mission Section - Alternative Design -->
        <section class="py-24 relative overflow-hidden" style="background-image: url('image/parallax-02.jpg'); background-attachment: fixed; background-position: center; background-repeat: no-repeat; background-size: cover;">
            <!-- Dark overlay with gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-primary/70 to-primary/75"></div>
            
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full -translate-x-48 -translate-y-48"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-48 translate-y-48"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="text-left mb-16">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                        {{ __('messages.mission_section_title') }}
                    </h2>
                    <p class="text-white/90 text-lg md:text-xl max-w-3xl">
                        {{ __('messages.mission_section_subtitle') }}
                    </p>
                    <div class="w-20 h-1 bg-header-orange mt-6"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Mission Point 1 -->
                    <div class="bg-black/50 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-primary/50 transition-all duration-300 group">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-header-orange rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ __('messages.fight_corruption') }}</h3>
                        </div>
                        <p class="text-white/90 leading-relaxed text-center">
                            {{ __('messages.fight_corruption_desc') }}
                        </p>
                    </div>

                    <!-- Mission Point 2 -->
                    <div class="bg-black/50 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-primary/50 transition-all duration-300 group">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-header-orange rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ __('messages.restore_wealth') }}</h3>
                        </div>
                        <p class="text-white/90 leading-relaxed text-center">
                            {{ __('messages.restore_wealth_desc') }}
                        </p>
                    </div>

                    <!-- Mission Point 3 -->
                    <div class="bg-black/50 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-primary/50 transition-all duration-300 group">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-header-orange rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ __('messages.champion_governance') }}</h3>
                        </div>
                        <p class="text-white/90 leading-relaxed text-center">
                            {{ __('messages.champion_governance_desc') }}
                        </p>
                    </div>

                    <!-- Mission Point 4 -->
                    <div class="bg-black/50 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-primary/50 transition-all duration-300 group">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-header-orange rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ __('messages.empower_youth') }}</h3>
                        </div>
                        <p class="text-white/90 leading-relaxed text-center">
                            {{ __('messages.empower_youth_desc') }}
                        </p>
                    </div>

                    <!-- Mission Point 5 -->
                    <div class="bg-black/50 backdrop-blur-sm rounded-2xl p-8 border border-white/20 hover:bg-primary/50 transition-all duration-300 group md:col-span-2 lg:col-span-1">
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-header-orange rounded-xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-white">{{ __('messages.serve_communities') }}</h3>
                        </div>
                        <p class="text-white/90 leading-relaxed text-center">
                            {{ __('messages.serve_communities_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Image Gallery Grid Section -->
        <section class="py-16 bg-gradient-to-br from-gray-50 to-white" aria-labelledby="gallery-heading">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-left mb-12">
                    <h2 id="gallery-heading" class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        {{ __('messages.photo_gallery') }}
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl">
                        {{ __('messages.gallery_section') }}
                    </p>
                    <div class="w-20 h-1 bg-header-orange mt-6"></div>
                </div>

                <!-- Multi-Image Grid Container -->
                @if($galleryPhotos->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($galleryPhotos as $photo)
                    <!-- '{{ addslashes($photo->media->name) }}', removed name from lightbox -->
                    <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 cursor-pointer" onclick="openLightbox('{{ $photo->media->url }}', '{{ addslashes($photo->media->alt_text ?? '') }}')">
                        <img src="{{ $photo->media->url }}" alt="{{ $photo->media->alt_text ?? $photo->media->name }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- <h3 class="text-lg font-bold mb-1">{{ $photo->media->name }}</h3> -->
                            @if($photo->media->alt_text)
                            <p class="text-sm text-white/90">{{ $photo->media->alt_text }}</p>
                            @endif
                        </div>
                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm rounded-full p-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- View All Button -->
                <div class="text-center mt-12">
                    <a href="{{ route('photo-gallery.index') }}" class="inline-block bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105">
                        {{ __('messages.view_gallery') }}
                    </a>
                </div>
                @else
                <div class="text-center py-12">
                    <p class="text-gray-500">{{ __('messages.no_photos') }}</p>
                </div>
                @endif

                <!-- Lightbox Modal -->
                <div id="lightbox" class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
                    <div class="relative max-w-4xl max-h-full">
                        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-lg">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6 rounded-b-lg">
                            <h3 id="lightbox-title" class="text-white text-xl font-bold mb-2"></h3>
                            <p id="lightbox-description" class="text-white/90"></p>
                        </div>
                        <button onclick="closeLightbox()" class="absolute top-4 right-4 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white rounded-full p-3 transition-all duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

      
        </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let videoCarouselIndex = 0;
    const videoCarousel = document.getElementById('video-carousel');
    
    if (!videoCarousel) return;
    
    const videoItems = videoCarousel.children.length;

    function scrollVideoCarousel(direction) {
        const containerWidth = videoCarousel.parentElement.offsetWidth;
        const visibleItems = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
        const maxIndex = Math.max(0, videoItems - visibleItems);
        
        videoCarouselIndex = Math.max(0, Math.min(maxIndex, videoCarouselIndex + direction));
        
        const scrollPercentage = (videoCarouselIndex / visibleItems) * 100;
        videoCarousel.style.transform = `translateX(-${scrollPercentage}%)`;
    }

    // Make function globally accessible
    window.scrollVideoCarousel = scrollVideoCarousel;

    // Auto-scroll every 3 seconds
    let videoAutoScroll = setInterval(() => {
        const visibleItems = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
        const maxIndex = Math.max(0, videoItems - visibleItems);
        
        if (videoCarouselIndex >= maxIndex) {
            videoCarouselIndex = 0;
        } else {
            videoCarouselIndex++;
        }
        
        const scrollPercentage = (videoCarouselIndex / visibleItems) * 100;
        videoCarousel.style.transform = `translateX(-${scrollPercentage}%)`;
    }, 3000);

    // Pause auto-scroll on hover
    videoCarousel.parentElement.addEventListener('mouseenter', () => {
        clearInterval(videoAutoScroll);
    });
    
    videoCarousel.parentElement.addEventListener('mouseleave', () => {
        videoAutoScroll = setInterval(() => {
            const visibleItems = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
            const maxIndex = Math.max(0, videoItems - visibleItems);
            
            if (videoCarouselIndex >= maxIndex) {
                videoCarouselIndex = 0;
            } else {
                videoCarouselIndex++;
            }
            
            const scrollPercentage = (videoCarouselIndex / visibleItems) * 100;
            videoCarousel.style.transform = `translateX(-${scrollPercentage}%)`;
        }, 3000);
    });
});
</script>
@endpush