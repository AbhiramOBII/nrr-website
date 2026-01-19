@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-[#3B7080] py-12 md:py-12">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.print_media_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.print_media_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Print Media Grid -->
    <section class="py-12 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($printMedia->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($printMedia as $item)
                <div class="group cursor-pointer" onclick="openLightbox({{ $loop->index }})">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="w-full overflow-hidden">
                            <img src="{{ $item->media->url }}" alt="{{ $item->title }}" 
                                 class="w-full h-[200px] object-contain group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 text-sm line-clamp-2">{{ $item->title }}</h3>
                            @if($item->published_date)
                            <p class="text-xs text-gray-500 mt-1">{{ $item->published_date->format('M d, Y') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            @if($printMedia->hasPages())
            <div class="mt-12">
                {{ $printMedia->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-12">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_print_media_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>

<!-- Lightbox -->
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
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[85vh] object-contain" onclick="event.stopPropagation()">
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
const printMediaItems = [
    @foreach($printMedia as $item)
    {
        url: '{{ $item->media->url }}',
        title: '{{ addslashes($item->title) }}',
        date: '{{ $item->published_date ? $item->published_date->format("M d, Y") : "" }}'
    },
    @endforeach
];

let currentIndex = 0;

function openLightbox(index) {
    currentIndex = index;
    const item = printMediaItems[currentIndex];
    
    document.getElementById('lightbox-image').src = item.url;
    document.getElementById('lightbox-image').alt = item.title;
    document.getElementById('lightbox-title').textContent = item.title;
    document.getElementById('lightbox-date').textContent = item.date;
    document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${printMediaItems.length}`;
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function navigateLightbox(direction) {
    currentIndex = (currentIndex + direction + printMediaItems.length) % printMediaItems.length;
    const item = printMediaItems[currentIndex];
    
    document.getElementById('lightbox-image').src = item.url;
    document.getElementById('lightbox-image').alt = item.title;
    document.getElementById('lightbox-title').textContent = item.title;
    document.getElementById('lightbox-date').textContent = item.date;
    document.getElementById('lightbox-counter').textContent = `${currentIndex + 1} / ${printMediaItems.length}`;
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
