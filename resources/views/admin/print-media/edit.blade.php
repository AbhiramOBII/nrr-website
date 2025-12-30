@extends('admin.layouts.app')

@section('title', 'Edit Print Media')

@section('page-title', 'Edit Print Media')
@section('page-description', 'Update print media details')

@section('content')
<form action="{{ route('admin.print-media.update', $printMedia) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (English) *</label>
                <input type="text" name="title_en" value="{{ old('title_en', $printMedia->title_en) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (Kannada)</label>
                <input type="text" name="title_kn" value="{{ old('title_kn', $printMedia->title_kn) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (English)</label>
                <textarea name="description_en" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('description_en', $printMedia->description_en) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description (Kannada)</label>
                <textarea name="description_kn" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('description_kn', $printMedia->description_kn) }}</textarea>
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Published Date</label>
            <input type="date" name="published_date" value="{{ old('published_date', $printMedia->published_date?->format('Y-m-d')) }}"
                   class="w-full md:w-1/2 px-4 py-2 border border-gray-300 rounded-lg">
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Select Image *</h3>
        <p class="text-sm text-gray-500 mb-4">Select an image from the media library</p>
        
        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 max-h-64 overflow-y-auto p-2 border border-gray-200 rounded-lg">
            @foreach($media as $item)
            <label class="relative cursor-pointer group">
                <input type="radio" name="media_id" value="{{ $item->id }}" {{ $printMedia->media_id == $item->id ? 'checked' : '' }} class="sr-only peer" required>
                <img src="{{ $item->url }}" alt="{{ $item->name }}" 
                     class="w-full aspect-square object-cover rounded-lg border-2 border-transparent peer-checked:border-primary peer-checked:ring-2 peer-checked:ring-primary/50">
                <div class="absolute inset-0 bg-primary/20 rounded-lg opacity-0 peer-checked:opacity-100"></div>
            </label>
            @endforeach
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Settings</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <option value="active" {{ $printMedia->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $printMedia->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $printMedia->sort_order) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.print-media.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Print Media</button>
    </div>
</form>
@endsection
