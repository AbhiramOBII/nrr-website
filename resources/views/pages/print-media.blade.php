@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-gray-700 to-gray-900 py-16 md:py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.print_media_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.print_media_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Print Media Grid -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($printMedia->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($printMedia as $item)
                <div class="group cursor-pointer" onclick="openLightbox('{{ $item->media->url }}', '{{ $item->title }}')">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                        <div class="aspect-[3/4] overflow-hidden">
                            <img src="{{ $item->media->url }}" alt="{{ $item->title }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
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
            <div class="text-center py-16">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_print_media_found') }}</p>
            </div>
            @endif
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
