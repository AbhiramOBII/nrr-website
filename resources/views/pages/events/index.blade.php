@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 to-cyan-700 py-16 md:py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.events_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.events_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Events Grid -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($events->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                <a href="{{ route('event.show', $event->slug) }}" class="group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                    <div class="aspect-video overflow-hidden">
                        @if($event->featuredMedia)
                        <img src="{{ $event->featuredMedia->url }}" alt="{{ $event->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @elseif($event->media->first())
                        <img src="{{ $event->media->first()->url }}" alt="{{ $event->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-gray-400 text-4xl"></i>
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        @if($event->event_date)
                        <div class="flex items-center gap-2 text-sm text-blue-600 mb-2">
                            <i class="fas fa-calendar"></i>
                            {{ $event->event_date->format('M d, Y') }}
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors mb-2">
                            {{ $event->title }}
                        </h3>
                        <p class="text-gray-600 line-clamp-2">{{ $event->short_description }}</p>
                        @if($event->location)
                        <div class="flex items-center gap-2 text-sm text-gray-500 mt-3">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $event->location }}
                        </div>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
            
            @if($events->hasPages())
            <div class="mt-12">
                {{ $events->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-16">
                <i class="fas fa-calendar-alt text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_events_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

@endsection
