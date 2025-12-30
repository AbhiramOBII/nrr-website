@extends('admin.layouts.app')

@section('title', 'Edit Event')

@section('page-title', 'Edit Event')
@section('page-description', 'Update event details')

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

<form action="{{ route('admin.events.update', $event) }}" method="POST" class="space-y-6" id="eventForm">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (English) *</label>
                <input type="text" name="title_en" value="{{ old('title_en', $event->title_en) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (Kannada)</label>
                <input type="text" name="title_kn" value="{{ old('title_kn', $event->title_kn) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
                <input type="date" name="event_date" value="{{ old('event_date', $event->event_date?->format('Y-m-d')) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <input type="text" name="location" value="{{ old('location', $event->location) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (English) *</label>
                <textarea name="short_description_en" rows="3" required
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('short_description_en', $event->short_description_en) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (Kannada)</label>
                <textarea name="short_description_kn" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('short_description_kn', $event->short_description_kn) }}</textarea>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
        
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (English) *</label>
                <textarea name="description_en" id="description_en" rows="10"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('description_en', $event->description_en) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (Kannada)</label>
                <textarea name="description_kn" id="description_kn" rows="10"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('description_kn', $event->description_kn) }}</textarea>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Media</h3>
        
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
            <select name="featured_media_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="">Select Featured Image</option>
                @foreach($media as $item)
                <option value="{{ $item->id }}" {{ $event->featured_media_id == $item->id ? 'selected' : '' }}>{{ $item->name }} ({{ $item->file_name }})</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
            @php $selectedMedia = $event->media->pluck('id')->toArray(); @endphp
            <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 max-h-64 overflow-y-auto p-2 border border-gray-200 rounded-lg">
                @foreach($media as $item)
                <label class="relative cursor-pointer group">
                    <input type="checkbox" name="gallery_media[]" value="{{ $item->id }}" {{ in_array($item->id, $selectedMedia) ? 'checked' : '' }} class="sr-only peer">
                    <img src="{{ $item->url }}" alt="{{ $item->name }}" 
                         class="w-full aspect-square object-cover rounded-lg border-2 border-transparent peer-checked:border-primary peer-checked:ring-2 peer-checked:ring-primary/50">
                    <div class="absolute inset-0 bg-primary/20 rounded-lg opacity-0 peer-checked:opacity-100"></div>
                </label>
                @endforeach
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="active" {{ $event->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $event->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $event->sort_order) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.events.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Event</button>
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
document.getElementById('eventForm').addEventListener('submit', function(e) {
    if (editorEn) {
        const content = editorEn.getData();
        document.querySelector('#description_en').value = content;
        
        // Validate that description_en is not empty
        if (!content.trim()) {
            e.preventDefault();
            alert('Description (English) is required');
            return false;
        }
    }
    if (editorKn) {
        document.querySelector('#description_kn').value = editorKn.getData();
    }
});
</script>
@endpush
