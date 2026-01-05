@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-indigo-600 to-purple-700 py-16 md:py-24">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-1 bg-white/20 rounded-full text-white text-sm font-medium mb-4">
                    {{ __('messages.major_development_label') }}
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    {{ $development->title }}
                </h1>
                <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto">
                    {{ $development->short_description }}
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Featured Image -->
                    @if($development->featuredMedia)
                    <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ $development->featuredMedia->url }}" 
                             alt="{{ $development->title }}" 
                             class="w-full h-auto object-cover">
                    </div>
                    @endif

                    <!-- Description -->
                    <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
                        <div class="prose prose-lg max-w-none">
                            {!! $development->description !!}
                        </div>
                    </div>

                    <!-- Gallery -->
                    @if($development->media->count() > 0)
                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.gallery') }}</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($development->media as $media)
                            <div class="aspect-square rounded-lg overflow-hidden shadow-md cursor-pointer hover:shadow-xl transition-shadow"
                                 onclick="openLightbox('{{ $media->url }}', '{{ $media->alt_text ?? $development->title }}')">
                                @if($media->isImage())
                                <img src="{{ $media->url }}" 
                                     alt="{{ $media->alt_text ?? $development->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                @else
                                <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                    <i class="fas fa-play-circle text-white text-4xl"></i>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Other Developments -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">{{ __('messages.other_developments') }}</h3>
                        <div class="space-y-4">
                            @php
                                $otherDevelopments = \App\Models\MajorDevelopment::active()
                                    ->where('id', '!=', $development->id)
                                    ->ordered()
                                    ->limit(5)
                                    ->get();
                            @endphp
                            @forelse($otherDevelopments as $other)
                            <a href="{{ route('major-development.show', $other->slug) }}" 
                               class="flex items-center gap-3 p-3 rounded-lg hover:bg-indigo-50 transition-colors group">
                                @if($other->featuredMedia)
                                <img src="{{ $other->featuredMedia->url }}" 
                                     alt="{{ $other->title_en }}" 
                                     class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                                @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-building text-gray-400"></i>
                                </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors truncate">
                                        {{ $other->title }}
                                    </h4>
                                    <p class="text-xs text-gray-500 line-clamp-2">
                                        {{ Str::limit($other->short_description, 60) }}
                                    </p>
                                </div>
                            </a>
                            @empty
                            <p class="text-gray-500 text-sm">{{ __('messages.no_other_developments') }}</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Back to Home -->
                    <a href="{{ route('home') }}" 
                       class="flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-home"></i>
                        {{ __('messages.back_to_home') }}
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

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLightbox();
});
</script>
@endpush
