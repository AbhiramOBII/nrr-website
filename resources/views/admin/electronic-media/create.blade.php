@extends('admin.layouts.app')

@section('title', 'Add Electronic Media')

@section('page-title', 'Add Electronic Media')
@section('page-description', 'Add a YouTube video')

@section('content')
@if ($errors->any())
<div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 mb-6">
    <h3 class="font-semibold mb-2">Please fix the following errors:</h3>
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.electronic-media.store') }}" method="POST" class="space-y-6" id="mediaForm">
    @csrf
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (English) *</label>
                <input type="text" name="title_en" value="{{ old('title_en') }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (Kannada)</label>
                <input type="text" name="title_kn" value="{{ old('title_kn') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">YouTube URL *</label>
            <input type="url" name="youtube_url" value="{{ old('youtube_url') }}" required placeholder="https://www.youtube.com/watch?v=..."
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            @error('youtube_url')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (English)</label>
                <textarea name="short_description_en" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('short_description_en') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (Kannada)</label>
                <textarea name="short_description_kn" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('short_description_kn') }}</textarea>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                <textarea name="description_en" id="description_en" rows="6"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('description_en') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (Kannada)</label>
                <textarea name="description_kn" id="description_kn" rows="6"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('description_kn') }}</textarea>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Custom Thumbnail (Optional)</h3>
        <p class="text-sm text-gray-500 mb-4">Leave empty to use YouTube's default thumbnail</p>
        
        <input type="hidden" name="thumbnail_media_id" id="thumbnail_media_id" value="{{ old('thumbnail_media_id') }}">
        
        <div id="selected-thumbnail" class="mb-4 hidden">
            <div class="relative inline-block">
                <img id="thumbnail-preview" src="" alt="Selected thumbnail" class="w-32 h-32 object-cover rounded-lg border-2 border-primary">
                <button type="button" onclick="clearThumbnail()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        <button type="button" onclick="openThumbnailPicker()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
            Select Custom Thumbnail
        </button>
        
        <!-- Thumbnail Picker Modal -->
        <div id="thumbnail-picker-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-hidden">
                <div class="p-6 border-b">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-semibold">Select Thumbnail</h3>
                        <button type="button" onclick="closeThumbnailPicker()" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-6 overflow-y-auto max-h-[calc(90vh-140px)]">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($media as $item)
                        <div class="cursor-pointer group relative" onclick="selectThumbnail({{ $item->id }}, '{{ $item->url }}', '{{ addslashes($item->name) }}')">
                            <img src="{{ $item->url }}" alt="{{ $item->name }}" class="w-full h-32 object-cover rounded-lg border-2 border-gray-200 group-hover:border-primary transition-colors">
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-opacity rounded-lg flex items-center justify-center">
                                <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 mt-1 truncate">{{ $item->name }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="0"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.electronic-media.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Add Video</button>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
let editorEn, editorKn;

ClassicEditor
    .create(document.querySelector('#description_en'))
    .then(editor => {
        editorEn = editor;
    })
    .catch(error => console.error(error));

ClassicEditor
    .create(document.querySelector('#description_kn'))
    .then(editor => {
        editorKn = editor;
    })
    .catch(error => console.error(error));

// Sync CKEditor content before form submission
document.getElementById('mediaForm').addEventListener('submit', function(e) {
    if (editorEn) {
        document.querySelector('#description_en').value = editorEn.getData();
    }
    if (editorKn) {
        document.querySelector('#description_kn').value = editorKn.getData();
    }
});

// Thumbnail picker functions
function openThumbnailPicker() {
    document.getElementById('thumbnail-picker-modal').classList.remove('hidden');
}

function closeThumbnailPicker() {
    document.getElementById('thumbnail-picker-modal').classList.add('hidden');
}

function selectThumbnail(id, url, name) {
    document.getElementById('thumbnail_media_id').value = id;
    document.getElementById('thumbnail-preview').src = url;
    document.getElementById('selected-thumbnail').classList.remove('hidden');
    closeThumbnailPicker();
}

function clearThumbnail() {
    document.getElementById('thumbnail_media_id').value = '';
    document.getElementById('thumbnail-preview').src = '';
    document.getElementById('selected-thumbnail').classList.add('hidden');
}
</script>
@endpush
