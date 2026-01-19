@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-[#3B7080] py-12 md:py-12">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.photo_gallery_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.photo_gallery_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-12 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($galleryItems->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($galleryItems as $galleryItem)
                @php $mediaItem = $galleryItem->media; @endphp
                @continue(!$mediaItem)
                <div class="group cursor-pointer aspect-square rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow"
                     onclick="openMediaLightbox({{ $loop->index }})">
                    @if($mediaItem->isImage())
                    <img src="{{ $mediaItem->url }}" alt="{{ $mediaItem->alt_text ?? $mediaItem->name }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    @else
                    <div class="w-full h-full bg-gray-800 flex items-center justify-center relative">
                        <video src="{{ $mediaItem->url }}" class="w-full h-full object-cover"></video>
                        <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                            <i class="fas fa-play-circle text-white text-5xl group-hover:scale-110 transition-transform"></i>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            
            @if($galleryItems->hasPages())
            <div class="mt-12">
                {{ $galleryItems->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-12">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_media_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

<!-- Lightbox for Images -->
<div id="image-lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10" onclick="closeLightbox()">
        <i class="fas fa-times"></i>
    </button>
    
    <!-- Previous Button -->
    <button onclick="navigateLightbox(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 text-4xl z-10 bg-black/50 hover:bg-black/70 rounded-full w-12 h-12 flex items-center justify-center transition-all">
        <i class="fas fa-chevron-left"></i>
    </button>
    
    <!-- Next Button -->
    <button onclick="navigateLightbox(1)" class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 text-4xl z-10 bg-black/50 hover:bg-black/70 rounded-full w-12 h-12 flex items-center justify-center transition-all">
        <i class="fas fa-chevron-right"></i>
    </button>
    
    <div class="flex flex-col items-center justify-center max-w-full max-h-full">
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[85vh] object-contain" onclick="event.stopPropagation()">
        <div class="mt-4 text-white text-center px-4">
            <h3 id="lightbox-title" class="text-xl font-semibold"></h3>
            <p id="lightbox-counter" class="text-sm text-gray-300 mt-1"></p>
        </div>
    </div>
</div>

<!-- Lightbox for Videos -->
<div id="video-lightbox" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10" onclick="closeVideoLightbox()">
        <i class="fas fa-times"></i>
    </button>
    <video id="lightbox-video" src="" controls class="max-w-full max-h-full"></video>
</div>

@endsection

@push('scripts')
<script>
const galleryItems = [
    @foreach($galleryItems as $galleryItem)
    @php $mediaItem = $galleryItem->media; @endphp
    @if($mediaItem)
    {
        url: '{{ $mediaItem->url }}',
        name: '{{ addslashes($mediaItem->alt_text ?? $mediaItem->name) }}',
        type: '{{ $mediaItem->isVideo() ? "video" : "image" }}'
    },
    @endif
    @endforeach
];

let currentIndex = 0;

function openMediaLightbox(index) {
    currentIndex = index;
    const item = galleryItems[currentIndex];
    
    if (item.type === 'video') {
        document.getElementById('lightbox-video').src = item.url;
        document.getElementById('video-lightbox').classList.remove('hidden');
        document.getElementById('video-lightbox').classList.add('flex');
    } else {
        document.getElementById('lightbox-image').src = item.url;
        document.getElementById('lightbox-image').alt = item.name;
        document.getElementById('lightbox-title').textContent = item.name;
        document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${galleryItems.length}`;
        document.getElementById('image-lightbox').classList.remove('hidden');
        document.getElementById('image-lightbox').classList.add('flex');
    }
    document.body.style.overflow = 'hidden';
}

function navigateLightbox(direction) {
    currentIndex = (currentIndex + direction + galleryItems.length) % galleryItems.length;
    
    while (galleryItems[currentIndex].type === 'video' && direction !== 0) {
        currentIndex = (currentIndex + direction + galleryItems.length) % galleryItems.length;
    }
    
    const item = galleryItems[currentIndex];
    document.getElementById('lightbox-image').src = item.url;
    document.getElementById('lightbox-image').alt = item.name;
    document.getElementById('lightbox-title').textContent = item.name;
    document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${galleryItems.length}`;
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
    } else if (e.key === 'ArrowLeft') {
        navigateLightbox(-1);
    } else if (e.key === 'ArrowRight') {
        navigateLightbox(1);
    }
});
</script>
@endpush
