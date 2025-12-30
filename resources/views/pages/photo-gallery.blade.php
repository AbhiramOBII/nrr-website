@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-purple-600 to-pink-700 py-16 md:py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.photo_gallery_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.photo_gallery_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($media->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($media as $item)
                <div class="group cursor-pointer aspect-square rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow"
                     onclick="openMediaLightbox('{{ $item->url }}', '{{ $item->isVideo() ? 'video' : 'image' }}', '{{ $item->alt_text ?? $item->name }}')">
                    @if($item->isImage())
                    <img src="{{ $item->url }}" alt="{{ $item->alt_text ?? $item->name }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full bg-gray-800 flex items-center justify-center relative">
                        <video src="{{ $item->url }}" class="w-full h-full object-cover"></video>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                            <i class="fas fa-play-circle text-white text-5xl group-hover:scale-110 transition-transform"></i>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            
            @if($media->hasPages())
            <div class="mt-12">
                {{ $media->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-16">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_media_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

<!-- Lightbox for Images -->
<div id="image-lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4" onclick="closeLightbox()">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10" onclick="closeLightbox()">
        <i class="fas fa-times"></i>
    </button>
    <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain">
</div>

<!-- Lightbox for Videos -->
<div id="video-lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10" onclick="closeVideoLightbox()">
        <i class="fas fa-times"></i>
    </button>
    <video id="lightbox-video" src="" controls class="max-w-full max-h-full"></video>
</div>

@include('layouts.footer')
@endsection

@push('scripts')
<script>
function openMediaLightbox(src, type, alt) {
    if (type === 'video') {
        document.getElementById('lightbox-video').src = src;
        document.getElementById('video-lightbox').classList.remove('hidden');
        document.getElementById('video-lightbox').classList.add('flex');
    } else {
        document.getElementById('lightbox-image').src = src;
        document.getElementById('lightbox-image').alt = alt;
        document.getElementById('image-lightbox').classList.remove('hidden');
        document.getElementById('image-lightbox').classList.add('flex');
    }
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('image-lightbox').classList.add('hidden');
    document.getElementById('image-lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}

function closeVideoLightbox() {
    const video = document.getElementById('lightbox-video');
    video.pause();
    video.src = '';
    document.getElementById('video-lightbox').classList.add('hidden');
    document.getElementById('video-lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) { 
    if (e.key === 'Escape') {
        closeLightbox();
        closeVideoLightbox();
    }
});
</script>
@endpush
