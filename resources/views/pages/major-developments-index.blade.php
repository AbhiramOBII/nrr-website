@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <section class="relative bg-gradient-to-r from-indigo-600 to-purple-700 py-16 md:py-24">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-1 bg-white/20 rounded-full text-white text-sm font-medium mb-4">
                    {{ __('messages.major_development_label') }}
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    {{ __('messages.major_development') }}
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto">
                    {{ __('messages.explore_developments') }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($developments->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($developments as $development)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if($development->featuredMedia)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ $development->featuredMedia->url }}" 
                             alt="{{ $development->title }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                        <i class="fas fa-building text-white text-5xl opacity-50"></i>
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            {{ $development->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $development->short_description }}
                        </p>
                        <a href="{{ route('major-development.show', $development->slug) }}" 
                           class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-700 font-semibold transition-colors">
                            {{ __('messages.read_more') }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-200 rounded-full mb-4">
                    <i class="fas fa-building text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('messages.no_developments_yet') }}</h3>
                <p class="text-gray-600">{{ __('messages.check_back_later') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

@endsection
