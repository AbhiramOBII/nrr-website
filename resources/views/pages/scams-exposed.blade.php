@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <section class="relative bg-gradient-to-r from-red-600 to-pink-700 py-16 md:py-24">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-1 bg-white/20 rounded-full text-white text-sm font-medium mb-4">
                    {{ __('messages.corruption_exposed') }}
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    {{ __('messages.scams_exposed') }}
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto">
                    Exposing corruption and scams for transparency and accountability
                </p>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($scams->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($scams as $scam)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- @if($scam->featuredMedia)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ $scam->featuredMedia->url }}" 
                             alt="{{ $scam->title }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white text-5xl opacity-50"></i>
                    </div>
                    @endif -->
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            {{ $scam->title }}
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $scam->short_description }}
                        </p>
                        <a href="{{ route('scam-exposed.show', $scam->slug) }}" 
                           class="inline-flex items-center gap-2 text-red-600 hover:text-red-700 font-semibold transition-colors">
                            {{ __('messages.read_more') }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            @if($scams->hasPages())
            <div class="mt-12">
                {{ $scams->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-16">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-200 rounded-full mb-4">
                    <i class="fas fa-exclamation-triangle text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No scams exposed yet</h3>
                <p class="text-gray-600">Check back later for updates</p>
            </div>
            @endif
        </div>
    </section>
</main>

@endsection
