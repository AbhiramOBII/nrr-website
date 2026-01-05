@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-700 to-indigo-800 py-16 md:py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.official_media_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.official_media_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Official Media Grid -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($officialMedia->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($officialMedia as $index => $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                    @if($item->isUploadedMedia())
                        <div class="group cursor-pointer" onclick="openLightbox({{ $index }})">
                            <div class="aspect-video overflow-hidden">
                                @if($item->media && $item->media->isImage())
                                <img src="{{ $item->media->url }}" alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @elseif($item->media && $item->media->isVideo())
                                <video class="w-full h-full object-cover">
                                    <source src="{{ $item->media->url }}" type="video/mp4">
                                </video>
                                <div class="absolute inset-0 flex items-center justify-center bg-black/30">
                                    <i class="fas fa-play-circle text-white text-5xl"></i>
                                </div>
                                @endif
                            </div>
                        </div>
                    @elseif($item->media_type === 'youtube')
                        <div class="aspect-video">
                            <iframe src="{{ $item->getEmbedUrl() }}" 
                                    class="w-full h-full" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                        </div>
                    @elseif($item->media_type === 'instagram')
                        <div class="aspect-square">
                            <iframe src="{{ $item->getEmbedUrl() }}" 
                                    class="w-full h-full" 
                                    frameborder="0" 
                                    scrolling="no" 
                                    allowtransparency="true"></iframe>
                        </div>
                    @else
                        <div class="aspect-video bg-gray-100 flex items-center justify-center">
                            <a href="{{ $item->social_link }}" target="_blank" class="text-primary hover:text-primary/80">
                                <i class="fab fa-{{ $item->media_type }} text-6xl"></i>
                            </a>
                        </div>
                    @endif
                    
                    <div class="p-4">
                        <div class="flex items-center gap-2 mb-2">
                            @if($item->media_type === 'youtube')
                            <i class="fab fa-youtube text-red-600"></i>
                            @elseif($item->media_type === 'instagram')
                            <i class="fab fa-instagram text-pink-600"></i>
                            @elseif($item->media_type === 'facebook')
                            <i class="fab fa-facebook text-blue-600"></i>
                            @elseif($item->media_type === 'twitter')
                            <i class="fab fa-twitter text-blue-400"></i>
                            @elseif($item->media_type === 'video')
                            <i class="fas fa-video text-gray-600"></i>
                            @else
                            <i class="fas fa-image text-gray-600"></i>
                            @endif
                            <span class="text-xs text-gray-500 uppercase">{{ $item->media_type }}</span>
                        </div>
                        <h3 class="font-semibold text-gray-900 text-sm line-clamp-2 mb-2">{{ $item->title }}</h3>
                        @if($item->description_text)
                        <p class="text-xs text-gray-600 line-clamp-2 mb-2">{{ $item->description_text }}</p>
                        @endif
                        @if($item->published_date)
                        <p class="text-xs text-gray-500">{{ $item->published_date->format('M d, Y') }}</p>
                        @endif
                        @if($item->isSocialMedia())
                        <a href="{{ $item->social_link }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-primary hover:text-primary/80 mt-2">
                            View on {{ ucfirst($item->media_type) }}
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($officialMedia->hasPages())
            <div class="mt-12">
                {{ $officialMedia->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-16">
                <i class="fas fa-photo-video text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_official_media_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

<!-- Lightbox for Images/Videos -->
<div id="lightbox" class="fixed inset-0 bg-black/95 z-50 hidden items-center justify-center p-4">
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
        <div id="lightbox-content" class="max-w-full max-h-[85vh]">
            <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[85vh] object-contain hidden" onclick="event.stopPropagation()">
            <video id="lightbox-video" controls class="max-w-full max-h-[85vh] hidden" onclick="event.stopPropagation()">
                <source src="" type="video/mp4">
            </video>
        </div>
        <div class="mt-4 text-white text-center px-4">
            <h3 id="lightbox-title" class="text-xl font-semibold"></h3>
            <p id="lightbox-date" class="text-sm text-gray-300 mt-1"></p>
            <p id="lightbox-counter" class="text-sm text-gray-400 mt-1"></p>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
const officialMediaItems = [
    @foreach($officialMedia as $item)
    @if($item->isUploadedMedia())
    {
        type: '{{ $item->media_type }}',
        url: '{{ $item->media ? $item->media->url : "" }}',
        title: '{{ addslashes($item->title) }}',
        date: '{{ $item->published_date ? $item->published_date->format("M d, Y") : "" }}'
    },
    @endif
    @endforeach
];

let currentIndex = 0;

function openLightbox(index) {
    currentIndex = index;
    const item = officialMediaItems[currentIndex];
    
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxVideo = document.getElementById('lightbox-video');
    
    if (item.type === 'video') {
        lightboxImage.classList.add('hidden');
        lightboxVideo.classList.remove('hidden');
        lightboxVideo.querySelector('source').src = item.url;
        lightboxVideo.load();
    } else {
        lightboxVideo.classList.add('hidden');
        lightboxImage.classList.remove('hidden');
        lightboxImage.src = item.url;
    }
    
    document.getElementById('lightbox-image').src = item.url;
    document.getElementById('lightbox-image').alt = item.title;
    document.getElementById('lightbox-title').textContent = item.title;
    document.getElementById('lightbox-date').textContent = item.date;
    document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${officialMediaItems.length}`;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function navigateLightbox(direction) {
    currentIndex = (currentIndex + direction + officialMediaItems.length) % officialMediaItems.length;
    const item = officialMediaItems[currentIndex];
    
    document.getElementById('lightbox-image').src = item.url;
    document.getElementById('lightbox-image').alt = item.title;
    document.getElementById('lightbox-title').textContent = item.title;
    document.getElementById('lightbox-date').textContent = item.date;
    document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${officialMediaItems.length}`;
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) { 
    if (e.key === 'Escape') {
        closeLightbox();
    } else if (e.key === 'ArrowLeft') {
        navigateLightbox(-1);
    } else if (e.key === 'ArrowRight') {
        navigateLightbox(1);
    }
});
</script>
@endpush
