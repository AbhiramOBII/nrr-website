@extends('admin.layouts.app')

@section('title', 'Photo Gallery Management')

@section('page-title', 'Photo Gallery Management')
@section('page-description', 'Select media to display in the public photo gallery')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <form action="{{ route('admin.photo-gallery.update') }}" method="POST" id="gallery-form">
        @csrf
        
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button type="button" onclick="selectAll()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                    <i class="fas fa-check-double mr-2"></i>Select All
                </button>
                <button type="button" onclick="deselectAll()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>Deselect All
                </button>
                <span class="text-sm text-gray-500">
                    <span id="selected-count">{{ count($selectedMediaIds) }}</span> of {{ $allMedia->count() }} selected
                </span>
            </div>
            <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg flex items-center gap-2 transition-colors">
                <i class="fas fa-save"></i>
                Save Gallery
            </button>
        </div>

        <div class="p-6">
            @if($allMedia->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($allMedia as $index => $item)
                <div class="relative group">
                    <label class="cursor-pointer block">
                        <input type="checkbox" 
                               name="media_ids[]" 
                               value="{{ $item->id }}" 
                               class="media-checkbox absolute top-2 left-2 w-5 h-5 rounded border-2 border-white shadow-lg z-10 cursor-pointer"
                               {{ in_array($item->id, $selectedMediaIds) ? 'checked' : '' }}
                               onchange="updateSelectedCount()">
                        
                        <div class="aspect-square rounded-lg overflow-hidden bg-gray-100 border-2 transition-all {{ in_array($item->id, $selectedMediaIds) ? 'border-primary ring-2 ring-primary/30' : 'border-transparent' }}">
                            @if($item->isImage())
                            <img src="{{ $item->url }}" alt="{{ $item->alt_text ?? $item->name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-800">
                                <i class="fas fa-play-circle text-white text-4xl"></i>
                            </div>
                            @endif
                        </div>
                        
                        <div class="mt-2 text-xs text-gray-600 truncate">
                            <span class="font-semibold">#{{ $index + 1 }}</span> - {{ $item->name }}
                        </div>
                    </label>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg mb-4">No media files found</p>
                <a href="{{ route('admin.media.index') }}" class="text-primary hover:text-primary/80 font-semibold">
                    Upload media files first
                </a>
            </div>
            @endif
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
function selectAll() {
    const checkboxes = document.querySelectorAll('.media-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = true;
        checkbox.closest('.aspect-square').classList.add('border-primary', 'ring-2', 'ring-primary/30');
        checkbox.closest('.aspect-square').classList.remove('border-transparent');
    });
    updateSelectedCount();
}

function deselectAll() {
    const checkboxes = document.querySelectorAll('.media-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
        checkbox.closest('.aspect-square').classList.remove('border-primary', 'ring-2', 'ring-primary/30');
        checkbox.closest('.aspect-square').classList.add('border-transparent');
    });
    updateSelectedCount();
}

function updateSelectedCount() {
    const checkboxes = document.querySelectorAll('.media-checkbox:checked');
    document.getElementById('selected-count').textContent = checkboxes.length;
    
    document.querySelectorAll('.media-checkbox').forEach(checkbox => {
        const container = checkbox.closest('.aspect-square');
        if (checkbox.checked) {
            container.classList.add('border-primary', 'ring-2', 'ring-primary/30');
            container.classList.remove('border-transparent');
        } else {
            container.classList.remove('border-primary', 'ring-2', 'ring-primary/30');
            container.classList.add('border-transparent');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateSelectedCount();
});
</script>
@endpush
