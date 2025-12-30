@extends('admin.layouts.app')

@section('title', 'Edit Major Development')

@section('page-title', 'Edit Major Development')
@section('page-description', 'Update major development project')

@section('content')
<form action="{{ route('admin.major-developments.update', $majorDevelopment) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Title -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Title</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (English) *</label>
                        <input type="text" name="title_en" value="{{ old('title_en', $majorDevelopment->title_en) }}" required
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent @error('title_en') border-red-500 @enderror">
                        @error('title_en')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title (Kannada)</label>
                        <input type="text" name="title_kn" value="{{ old('title_kn', $majorDevelopment->title_kn) }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>
            </div>

            <!-- Short Description -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Short Description</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Short Description (English) *</label>
                        <textarea name="short_description_en" rows="3" required
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent @error('short_description_en') border-red-500 @enderror">{{ old('short_description_en', $majorDevelopment->short_description_en) }}</textarea>
                        @error('short_description_en')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Short Description (Kannada)</label>
                        <textarea name="short_description_kn" rows="3"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('short_description_kn', $majorDevelopment->short_description_kn) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Description (CKEditor) -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Full Description</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (English) *</label>
                        <textarea name="description_en" id="description_en" rows="10"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 ckeditor @error('description_en') border-red-500 @enderror">{{ old('description_en', $majorDevelopment->description_en) }}</textarea>
                        @error('description_en')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description (Kannada)</label>
                        <textarea name="description_kn" id="description_kn" rows="10"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 ckeditor">{{ old('description_kn', $majorDevelopment->description_kn) }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Publish Options -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Publish</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="active" {{ old('status', $majorDevelopment->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $majorDevelopment->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $majorDevelopment->sort_order) }}" min="0"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">
                    </div>
                </div>
                <div class="mt-6 flex gap-3">
                    <button type="submit" class="flex-1 bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-save mr-2"></i>Update
                    </button>
                    <a href="{{ route('admin.major-developments.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>

            <!-- Featured Media -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Media</h3>
                <div id="featuredMediaPreview" class="mb-4 {{ $majorDevelopment->featuredMedia ? '' : 'hidden' }}">
                    @if($majorDevelopment->featuredMedia)
                    <img id="featuredMediaImage" src="{{ $majorDevelopment->featuredMedia->url }}" alt="Featured" class="w-full h-40 object-cover rounded-lg">
                    @else
                    <img id="featuredMediaImage" src="" alt="Featured" class="w-full h-40 object-cover rounded-lg">
                    @endif
                    <button type="button" onclick="removeFeaturedMedia()" class="mt-2 text-red-500 hover:text-red-700 text-sm">
                        <i class="fas fa-times mr-1"></i>Remove
                    </button>
                </div>
                <input type="hidden" name="featured_media_id" id="featuredMediaId" value="{{ old('featured_media_id', $majorDevelopment->featured_media_id) }}">
                <button type="button" onclick="openMediaPicker('featured')" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-primary transition-colors">
                    <i class="fas fa-image text-2xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-500">Select Featured Image</p>
                </button>
            </div>

            <!-- Gallery Media -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Gallery Media</h3>
                <div id="galleryMediaPreview" class="grid grid-cols-3 gap-2 mb-4">
                    @foreach($majorDevelopment->media as $galleryItem)
                    <div class="relative aspect-square" data-gallery-id="{{ $galleryItem->id }}">
                        <img src="{{ $galleryItem->url }}" class="w-full h-full object-cover rounded-lg">
                        <button type="button" onclick="removeGalleryMedia('{{ $galleryItem->id }}')" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            <i class="fas fa-times"></i>
                        </button>
                        <input type="hidden" name="media_ids[]" value="{{ $galleryItem->id }}">
                    </div>
                    @endforeach
                </div>
                <button type="button" onclick="openMediaPicker('gallery')" class="w-full border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:border-primary transition-colors">
                    <i class="fas fa-images text-2xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-500">Add Gallery Media</p>
                </button>
            </div>
        </div>
    </div>
</form>

<!-- Media Picker Modal -->
<div id="mediaPickerModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl mx-4 max-h-[80vh] flex flex-col">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Select Media</h3>
            <button onclick="closeMediaPicker()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6 overflow-y-auto flex-1">
            <div class="grid grid-cols-4 md:grid-cols-6 gap-4" id="mediaPickerGrid">
                @foreach($media as $item)
                @if($item->isImage())
                <div class="relative aspect-square cursor-pointer group media-item" data-id="{{ $item->id }}" data-url="{{ $item->url }}" onclick="selectMedia(this)">
                    <img src="{{ $item->url }}" alt="{{ $item->name }}" class="w-full h-full object-cover rounded-lg">
                    <div class="absolute inset-0 bg-primary/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                        <i class="fas fa-check text-white text-2xl"></i>
                    </div>
                    <div class="selected-overlay absolute inset-0 bg-primary/70 opacity-0 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-3xl"></i>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
            <button type="button" onclick="closeMediaPicker()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                Cancel
            </button>
            <button type="button" onclick="confirmMediaSelection()" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors">
                Select
            </button>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.media-item.selected .selected-overlay { opacity: 1; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
// Initialize CKEditor
document.querySelectorAll('.ckeditor').forEach(element => {
    ClassicEditor.create(element, {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
    }).catch(error => console.error(error));
});

// Media Picker
let pickerMode = 'featured';
let selectedMediaIds = [];

function openMediaPicker(mode) {
    pickerMode = mode;
    selectedMediaIds = [];
    document.querySelectorAll('.media-item').forEach(item => item.classList.remove('selected'));
    document.getElementById('mediaPickerModal').classList.remove('hidden');
    document.getElementById('mediaPickerModal').classList.add('flex');
}

function closeMediaPicker() {
    document.getElementById('mediaPickerModal').classList.add('hidden');
    document.getElementById('mediaPickerModal').classList.remove('flex');
}

function selectMedia(element) {
    const id = element.dataset.id;
    
    if (pickerMode === 'featured') {
        document.querySelectorAll('.media-item').forEach(item => item.classList.remove('selected'));
        element.classList.add('selected');
        selectedMediaIds = [id];
    } else {
        element.classList.toggle('selected');
        if (element.classList.contains('selected')) {
            selectedMediaIds.push(id);
        } else {
            selectedMediaIds = selectedMediaIds.filter(i => i !== id);
        }
    }
}

function confirmMediaSelection() {
    if (pickerMode === 'featured' && selectedMediaIds.length > 0) {
        const id = selectedMediaIds[0];
        const element = document.querySelector(`.media-item[data-id="${id}"]`);
        document.getElementById('featuredMediaId').value = id;
        document.getElementById('featuredMediaImage').src = element.dataset.url;
        document.getElementById('featuredMediaPreview').classList.remove('hidden');
    } else if (pickerMode === 'gallery') {
        const preview = document.getElementById('galleryMediaPreview');
        selectedMediaIds.forEach(id => {
            const element = document.querySelector(`.media-item[data-id="${id}"]`);
            if (!document.querySelector(`input[name="media_ids[]"][value="${id}"]`)) {
                preview.innerHTML += `
                    <div class="relative aspect-square" data-gallery-id="${id}">
                        <img src="${element.dataset.url}" class="w-full h-full object-cover rounded-lg">
                        <button type="button" onclick="removeGalleryMedia('${id}')" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">
                            <i class="fas fa-times"></i>
                        </button>
                        <input type="hidden" name="media_ids[]" value="${id}">
                    </div>
                `;
            }
        });
    }
    closeMediaPicker();
}

function removeFeaturedMedia() {
    document.getElementById('featuredMediaId').value = '';
    document.getElementById('featuredMediaPreview').classList.add('hidden');
}

function removeGalleryMedia(id) {
    document.querySelector(`[data-gallery-id="${id}"]`).remove();
}
</script>
@endpush
