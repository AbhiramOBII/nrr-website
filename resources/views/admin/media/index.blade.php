@extends('admin.layouts.app')

@section('title', 'Media Library')

@section('page-title', 'Media Library')
@section('page-description', 'Manage your images and videos')

@section('page-actions')
<button onclick="openUploadModal()" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg flex items-center gap-2 transition-colors">
    <i class="fas fa-upload"></i>
    Upload Media
</button>
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Filters -->
    <div class="p-4 border-b border-gray-200 flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.media.index') }}" 
               class="px-4 py-2 rounded-lg {{ $type === 'all' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                All
            </a>
            <a href="{{ route('admin.media.index', ['type' => 'image']) }}" 
               class="px-4 py-2 rounded-lg {{ $type === 'image' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                <i class="fas fa-image mr-2"></i>Images
            </a>
            <a href="{{ route('admin.media.index', ['type' => 'video']) }}" 
               class="px-4 py-2 rounded-lg {{ $type === 'video' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                <i class="fas fa-video mr-2"></i>Videos
            </a>
        </div>
        <div class="text-sm text-gray-500">
            {{ $media->total() }} items
        </div>
    </div>

    <!-- Media Grid -->
    <div class="p-6">
        @if($media->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($media as $item)
            <div class="relative group bg-gray-100 rounded-lg overflow-hidden aspect-square">
                @if($item->isImage())
                <img src="{{ $item->url }}" alt="{{ $item->alt_text ?? $item->name }}" class="w-full h-full object-cover">
                @else
                <div class="w-full h-full flex items-center justify-center bg-gray-800">
                    <i class="fas fa-play-circle text-white text-4xl"></i>
                </div>
                @endif
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center gap-2">
                    <p class="text-white text-xs text-center px-2 truncate w-full">{{ $item->name }}</p>
                    <p class="text-gray-300 text-xs">{{ $item->formatted_size }}</p>
                    <div class="flex gap-2 mt-2">
                        <button onclick="previewMedia('{{ $item->url }}', '{{ $item->isVideo() ? 'video' : 'image' }}', '{{ addslashes($item->name) }}')" 
                                class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-colors" title="Preview">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button onclick="editMedia({{ $item->id }}, '{{ $item->name }}', '{{ $item->alt_text }}')" 
                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteMedia({{ $item->id }})" 
                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg transition-colors" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $media->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <i class="fas fa-photo-video text-gray-300 text-6xl mb-4"></i>
            <p class="text-gray-500">No media files found</p>
            <button onclick="openUploadModal()" class="mt-4 text-primary hover:text-primary/80">
                Upload your first media file
            </button>
        </div>
        @endif
    </div>
</div>

<!-- Upload Modal -->
<div id="uploadModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg mx-4">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Upload Media</h3>
            <button onclick="closeUploadModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-primary transition-colors" id="dropZone">
                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-600 mb-2">Drag and drop files here or</p>
                <label class="cursor-pointer">
                    <span class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-lg inline-block transition-colors">
                        Browse Files
                    </span>
                    <input type="file" name="files[]" multiple accept="image/*,video/*" class="hidden" id="fileInput" onchange="handleFileSelect(this)">
                </label>
                <p class="text-gray-400 text-sm mt-4">Supports: JPG, PNG, GIF, WEBP, MP4, WEBM, MOV (max 50MB)</p>
            </div>
            <div id="filePreview" class="mt-4 space-y-2 hidden"></div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeUploadModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md mx-4">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Edit Media</h3>
            <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <form id="editForm" method="POST" class="p-6">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" id="editName" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alt Text</label>
                    <input type="text" name="alt_text" id="editAltText" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="bg-primary hover:bg-primary/90 text-white px-6 py-2 rounded-lg transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Form -->
<form id="deleteForm" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

<!-- Preview Modal -->
<div id="previewModal" class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center p-4">
    <button onclick="closePreviewModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10">
        <i class="fas fa-times"></i>
    </button>
    <div class="max-w-5xl w-full">
        <div id="imagePreview" class="hidden">
            <img id="previewImage" src="" alt="" class="max-w-full max-h-[80vh] mx-auto object-contain rounded-lg">
        </div>
        <div id="videoPreview" class="hidden">
            <video id="previewVideo" src="" controls class="max-w-full max-h-[80vh] mx-auto rounded-lg"></video>
        </div>
        <p id="previewTitle" class="text-white text-center mt-4 text-lg font-medium"></p>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openUploadModal() {
    document.getElementById('uploadModal').classList.remove('hidden');
    document.getElementById('uploadModal').classList.add('flex');
}

function closeUploadModal() {
    document.getElementById('uploadModal').classList.add('hidden');
    document.getElementById('uploadModal').classList.remove('flex');
    document.getElementById('fileInput').value = '';
    document.getElementById('filePreview').classList.add('hidden');
    document.getElementById('filePreview').innerHTML = '';
}

function handleFileSelect(input) {
    const preview = document.getElementById('filePreview');
    preview.innerHTML = '';
    
    if (input.files.length > 0) {
        preview.classList.remove('hidden');
        Array.from(input.files).forEach(file => {
            const div = document.createElement('div');
            div.className = 'flex items-center justify-between bg-gray-100 rounded-lg px-4 py-2';
            div.innerHTML = `
                <span class="text-sm text-gray-700 truncate">${file.name}</span>
                <span class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
            `;
            preview.appendChild(div);
        });
    }
}

function editMedia(id, name, altText) {
    document.getElementById('editForm').action = `/admin/media/${id}`;
    document.getElementById('editName').value = name;
    document.getElementById('editAltText').value = altText || '';
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

function deleteMedia(id) {
    if (confirm('Are you sure you want to delete this media?')) {
        const form = document.getElementById('deleteForm');
        form.action = `/admin/media/${id}`;
        form.submit();
    }
}

function previewMedia(url, type, name) {
    document.getElementById('previewTitle').textContent = name;
    
    if (type === 'video') {
        document.getElementById('imagePreview').classList.add('hidden');
        document.getElementById('videoPreview').classList.remove('hidden');
        document.getElementById('previewVideo').src = url;
    } else {
        document.getElementById('videoPreview').classList.add('hidden');
        document.getElementById('imagePreview').classList.remove('hidden');
        document.getElementById('previewImage').src = url;
        document.getElementById('previewImage').alt = name;
    }
    
    document.getElementById('previewModal').classList.remove('hidden');
    document.getElementById('previewModal').classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closePreviewModal() {
    const video = document.getElementById('previewVideo');
    video.pause();
    video.src = '';
    document.getElementById('previewImage').src = '';
    document.getElementById('previewModal').classList.add('hidden');
    document.getElementById('previewModal').classList.remove('flex');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePreviewModal();
});

// Drag and drop
const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('fileInput');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropZone.addEventListener(eventName, highlight, false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropZone.addEventListener(eventName, unhighlight, false);
});

function highlight(e) {
    dropZone.classList.add('border-primary', 'bg-primary/5');
}

function unhighlight(e) {
    dropZone.classList.remove('border-primary', 'bg-primary/5');
}

dropZone.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    fileInput.files = files;
    handleFileSelect(fileInput);
}
</script>
@endpush
