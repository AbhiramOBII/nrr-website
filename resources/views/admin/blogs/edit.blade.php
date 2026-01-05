@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('page-title', 'Edit Blog')
@section('page-description', 'Update blog post')

@section('content')
<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (English) *</label>
                <input type="text" name="title_en" value="{{ old('title_en', $blog->title_en) }}" required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title (Kannada)</label>
                <input type="text" name="title_kn" value="{{ old('title_kn', $blog->title_kn) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (English)</label>
                <textarea name="short_description_en" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('short_description_en', $blog->short_description_en) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description (Kannada)</label>
                <textarea name="short_description_kn" rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('short_description_kn', $blog->short_description_kn) }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Content (English) *</label>
                <textarea id="content_en" name="content_en" rows="8"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('content_en', $blog->content_en) }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Content (Kannada)</label>
                <textarea id="content_kn" name="content_kn" rows="8"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ old('content_kn', $blog->content_kn) }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                <input type="text" name="author" value="{{ old('author', $blog->author) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Published Date</label>
                <input type="date" name="published_date" value="{{ old('published_date', $blog->published_date?->format('Y-m-d')) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Image (Optional)</h3>
        <p class="text-sm text-gray-500 mb-4">Select a featured image from the media library</p>
        
        <div class="grid grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-2 max-h-64 overflow-y-auto p-2 border border-gray-200 rounded-lg">
            <label class="relative cursor-pointer group">
                <input type="radio" name="featured_media_id" value="" class="sr-only peer" {{ !$blog->featured_media_id ? 'checked' : '' }}>
                <div class="w-full aspect-square flex items-center justify-center rounded-lg border-2 border-dashed border-gray-300 peer-checked:border-primary peer-checked:bg-primary/10">
                    <span class="text-xs text-gray-400">None</span>
                </div>
            </label>
            @foreach($media as $item)
            <label class="relative cursor-pointer group">
                <input type="radio" name="featured_media_id" value="{{ $item->id }}" class="sr-only peer"
                       {{ $blog->featured_media_id == $item->id ? 'checked' : '' }}>
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
                    <option value="active" {{ $blog->status === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $blog->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $blog->sort_order) }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
        </div>
    </div>

    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.blogs.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-primary/90">Update Blog</button>
    </div>
</form>
@endsection

@push('scripts')
<script>
let editorEn, editorKn;

ClassicEditor
    .create(document.querySelector('#content_en'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
            ]
        }
    })
    .then(editor => {
        editorEn = editor;
    })
    .catch(error => {
        console.error(error);
    });

ClassicEditor
    .create(document.querySelector('#content_kn'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
            ]
        }
    })
    .then(editor => {
        editorKn = editor;
    })
    .catch(error => {
        console.error(error);
    });

// Handle form submission - sync CKEditor data to textareas
document.querySelector('form').addEventListener('submit', function(e) {
    if (editorEn) {
        const contentEn = editorEn.getData();
        document.querySelector('#content_en').value = contentEn;
        
        // Validate English content is not empty
        if (!contentEn || contentEn.trim() === '') {
            e.preventDefault();
            alert('Content (English) is required!');
            return false;
        }
    }
    if (editorKn) {
        document.querySelector('#content_kn').value = editorKn.getData();
    }
});
</script>
@endpush
