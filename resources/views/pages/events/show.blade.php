@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 to-cyan-700 py-16 md:py-24">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-1 bg-white/20 rounded-full text-white text-sm font-medium mb-4">
                    {{ __('messages.event_label') }}
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $event->title }}</h1>
                <div class="flex items-center justify-center gap-6 text-white/90">
                    @if($event->event_date)
                    <span class="flex items-center gap-2">
                        <i class="fas fa-calendar"></i>
                        {{ $event->event_date->format('F d, Y') }}
                    </span>
                    @endif
                    @if($event->location)
                    <span class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $event->location }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    @if($event->featuredMedia)
                    <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ $event->featuredMedia->url }}" alt="{{ $event->title }}" class="w-full h-auto object-cover">
                    </div>
                    @elseif($event->media->first())
                    <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ $event->media->first()->url }}" alt="{{ $event->title }}" class="w-full h-auto object-cover">
                    </div>
                    @endif

                    <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
                        <div class="prose prose-lg max-w-none">
                            {!! $event->description !!}
                        </div>
                    </div>

                    @if($event->media->count() > 0)
                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.event_gallery') }}</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($event->media as $media)
                            <div class="aspect-square rounded-lg overflow-hidden shadow-md cursor-pointer hover:shadow-xl transition-shadow"
                                 onclick="openLightbox('{{ $media->url }}', '{{ $media->alt_text ?? $event->title }}')">
                                <img src="{{ $media->url }}" alt="{{ $media->alt_text ?? $event->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">{{ __('messages.other_events') }}</h3>
                        <div class="space-y-4">
                            @php
                                $otherEvents = \App\Models\Event::active()->where('id', '!=', $event->id)->ordered()->limit(5)->get();
                            @endphp
                            @forelse($otherEvents as $other)
                            <a href="{{ route('event.show', $other->slug) }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-blue-50 transition-colors group">
                                @if($other->featuredMedia)
                                <img src="{{ $other->featuredMedia->url }}" alt="{{ $other->title_en }}" class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                                @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-gray-900 group-hover:text-blue-600 transition-colors truncate">{{ $other->title }}</h4>
                                    @if($other->event_date)
                                    <p class="text-xs text-gray-500">{{ $other->event_date->format('M d, Y') }}</p>
                                    @endif
                                </div>
                            </a>
                            @empty
                            <p class="text-gray-500 text-sm">{{ __('messages.no_other_events') }}</p>
                            @endforelse
                        </div>
                    </div>

                    <a href="{{ route('events.index') }}" class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-arrow-left"></i>
                        {{ __('messages.back_to_events') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4" onclick="closeLightbox()">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl" onclick="closeLightbox()">
        <i class="fas fa-times"></i>
    </button>
    <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain">
</div>

@include('layouts.footer')
@endsection

@push('scripts')
<script>
function openLightbox(src, alt) {
    document.getElementById('lightbox-image').src = src;
    document.getElementById('lightbox-image').alt = alt;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}
document.addEventListener('keydown', function(e) { if (e.key === 'Escape') closeLightbox(); });
</script>
@endpush
