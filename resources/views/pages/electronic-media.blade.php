@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-red-600 to-orange-600 py-16 md:py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.electronic_media_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.electronic_media_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Videos Grid -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($electronicMedia->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($electronicMedia as $item)
                <div class="group cursor-pointer bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow"
                     onclick="openVideoModal('{{ $item->embed_url }}', '{{ addslashes($item->title) }}')">
                    <div class="aspect-video overflow-hidden relative">
                        <img src="{{ $item->thumbnail_url }}" alt="{{ $item->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                            <i class="fab fa-youtube text-red-600 text-6xl group-hover:scale-110 transition-transform"></i>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-red-600 transition-colors mb-2 line-clamp-2">
                            {{ $item->title }}
                        </h3>
                        @if($item->short_description)
                        <p class="text-gray-600 text-sm line-clamp-2">{{ $item->short_description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($electronicMedia->hasPages())
            <div class="mt-12">
                {{ $electronicMedia->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-16">
                <i class="fab fa-youtube text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_videos_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

<!-- Video Modal -->
<div id="video-modal" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10" onclick="closeVideoModal()">
        <i class="fas fa-times"></i>
    </button>
    <div class="w-full max-w-4xl">
        <div class="aspect-video">
            <iframe id="youtube-iframe" src="" class="w-full h-full" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
        </div>
        <h3 id="video-title" class="text-white text-xl font-bold mt-4 text-center"></h3>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openVideoModal(embedUrl, title) {
    document.getElementById('youtube-iframe').src = embedUrl + '?autoplay=1';
    document.getElementById('video-title').textContent = title;
    document.getElementById('video-modal').classList.remove('hidden');
    document.getElementById('video-modal').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
    document.getElementById('youtube-iframe').src = '';
    document.getElementById('video-modal').classList.add('hidden');
    document.getElementById('video-modal').classList.remove('flex');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) { 
    if (e.key === 'Escape') closeVideoModal();
});
</script>
@endpush
