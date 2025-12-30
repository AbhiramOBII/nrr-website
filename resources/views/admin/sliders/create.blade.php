@extends('admin.layouts.app')

@section('title', 'Add New Slider')

@section('content')
<div class="space-y-6">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.sliders.index') }}" class="text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Add New Slider</h1>
            <p class="text-gray-600 mt-1">Create a new homepage slider</p>
        </div>
    </div>

    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4">
        <h4 class="font-semibold mb-2">Please fix the following errors:</h4>
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.sliders.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Title & Description -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Slider Content</h3>
            
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description (English) *</label>
                    <textarea name="paragraph_en" rows="4" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('paragraph_en') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description (Kannada)</label>
                    <textarea name="paragraph_kn" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('paragraph_kn') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Button Settings -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Button Settings</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Button Text (English)</label>
                    <input type="text" name="button_text_en" value="{{ old('button_text_en', 'Learn More') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Button Text (Kannada)</label>
                    <input type="text" name="button_text_kn" value="{{ old('button_text_kn') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Button Link Type</label>
                <select name="button_link_type" id="button_link_type" onchange="toggleLinkOptions()"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">No Link</option>
                    <option value="major_development" {{ old('button_link_type') == 'major_development' ? 'selected' : '' }}>Major Development</option>
                    <option value="scam_exposed" {{ old('button_link_type') == 'scam_exposed' ? 'selected' : '' }}>Scam Exposed</option>
                    <option value="event" {{ old('button_link_type') == 'event' ? 'selected' : '' }}>Event</option>
                    <option value="custom" {{ old('button_link_type') == 'custom' ? 'selected' : '' }}>Custom URL</option>
                </select>
            </div>

            <!-- Major Development Select -->
            <div id="major_development_select" class="mt-4 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Major Development</label>
                <select name="button_link_id" class="major_development_id w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">Select...</option>
                    @foreach($majorDevelopments as $item)
                    <option value="{{ $item->id }}" {{ old('button_link_id') == $item->id ? 'selected' : '' }}>{{ $item->title_en }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Scam Exposed Select -->
            <div id="scam_exposed_select" class="mt-4 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Scam Exposed</label>
                <select name="button_link_id" class="scam_exposed_id w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">Select...</option>
                    @foreach($scamsExposed as $item)
                    <option value="{{ $item->id }}" {{ old('button_link_id') == $item->id ? 'selected' : '' }}>{{ $item->title_en }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Event Select -->
            <div id="event_select" class="mt-4 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Event</label>
                <select name="button_link_id" class="event_id w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="">Select...</option>
                    @foreach($events as $item)
                    <option value="{{ $item->id }}" {{ old('button_link_id') == $item->id ? 'selected' : '' }}>{{ $item->title_en }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Custom URL -->
            <div id="custom_url_input" class="mt-4 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-2">Custom URL</label>
                <input type="text" name="button_link_url" value="{{ old('button_link_url') }}" placeholder="https://..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <!-- Image Selection -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Slider Image *</h3>
            <p class="text-sm text-gray-500 mb-4">Select an image from the media library. Recommended size: 1920x800 pixels.</p>
            
            <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id') }}" required>
            
            <div id="selected-image" class="mb-4 {{ old('media_id') ? '' : 'hidden' }}">
                <div class="relative inline-block">
                    <img id="image-preview" src="" alt="Selected image" class="w-64 h-40 object-cover rounded-lg border-2 border-primary">
                    <button type="button" onclick="clearImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <button type="button" onclick="openImagePicker()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                Select Image from Media Library
            </button>
            
            <!-- Image Picker Modal -->
            <div id="image-picker-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-lg max-w-5xl w-full max-h-[90vh] overflow-hidden">
                    <div class="p-6 border-b">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">Select Slider Image</h3>
                            <button type="button" onclick="closeImagePicker()" class="text-gray-500 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-6 overflow-y-auto max-h-[calc(90vh-140px)]">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach($media as $item)
                            <div class="cursor-pointer group relative" onclick="selectImage({{ $item->id }}, '{{ $item->url }}', '{{ addslashes($item->name) }}')">
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

        <!-- Settings -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Lower numbers appear first</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('admin.sliders.index') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors">
                Create Slider
            </button>
        </div>
    </form>
</div>

<script>
function toggleLinkOptions() {
    const linkType = document.getElementById('button_link_type').value;
    
    // Hide all options first
    document.getElementById('major_development_select').classList.add('hidden');
    document.getElementById('scam_exposed_select').classList.add('hidden');
    document.getElementById('event_select').classList.add('hidden');
    document.getElementById('custom_url_input').classList.add('hidden');
    
    // Disable all select inputs
    document.querySelectorAll('.major_development_id, .scam_exposed_id, .event_id').forEach(el => {
        el.disabled = true;
        el.name = '';
    });
    
    // Show and enable the selected option
    if (linkType === 'major_development') {
        document.getElementById('major_development_select').classList.remove('hidden');
        const select = document.querySelector('.major_development_id');
        select.disabled = false;
        select.name = 'button_link_id';
    } else if (linkType === 'scam_exposed') {
        document.getElementById('scam_exposed_select').classList.remove('hidden');
        const select = document.querySelector('.scam_exposed_id');
        select.disabled = false;
        select.name = 'button_link_id';
    } else if (linkType === 'event') {
        document.getElementById('event_select').classList.remove('hidden');
        const select = document.querySelector('.event_id');
        select.disabled = false;
        select.name = 'button_link_id';
    } else if (linkType === 'custom') {
        document.getElementById('custom_url_input').classList.remove('hidden');
    }
}

function openImagePicker() {
    document.getElementById('image-picker-modal').classList.remove('hidden');
}

function closeImagePicker() {
    document.getElementById('image-picker-modal').classList.add('hidden');
}

function selectImage(id, url, name) {
    document.getElementById('media_id').value = id;
    document.getElementById('image-preview').src = url;
    document.getElementById('selected-image').classList.remove('hidden');
    closeImagePicker();
}

function clearImage() {
    document.getElementById('media_id').value = '';
    document.getElementById('image-preview').src = '';
    document.getElementById('selected-image').classList.add('hidden');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleLinkOptions();
});
</script>
@endsection
