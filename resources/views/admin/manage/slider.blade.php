@extends('admin.layouts.app')

@section('title', 'Manage Slider')
@section('page-title', 'Manage Slider')
@section('page-description', 'Manage homepage slider images and content')

@section('content')
<div class="space-y-6">
    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add New Slider Item -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Add New Slider Item</h3>
        </div>
        <div class="p-6">
            <form action="{{ route('admin.manage.slider.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <!-- English Content -->
                <div class="border-l-4 border-blue-500 pl-4 mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">English Content</h4>
                    <div class="space-y-4">
                        <div>
                            <label for="title_en" class="block text-sm font-medium text-gray-700">Title (English) *</label>
                            <input type="text" id="title_en" name="title_en" value="{{ old('title_en') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter English title">
                        </div>
                        <div>
                            <label for="paragraph_en" class="block text-sm font-medium text-gray-700">Description (English) *</label>
                            <textarea id="paragraph_en" name="paragraph_en" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter English description">{{ old('paragraph_en') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Kannada Content -->
                <div class="border-l-4 border-orange-500 pl-4 mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Kannada Content (ಕನ್ನಡ)</h4>
                    <div class="space-y-4">
                        <div>
                            <label for="title_kn" class="block text-sm font-medium text-gray-700">Title (Kannada)</label>
                            <input type="text" id="title_kn" name="title_kn" value="{{ old('title_kn') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="ಶೀರ್ಷಿಕೆ ನಮೂದಿಸಿ">
                        </div>
                        <div>
                            <label for="paragraph_kn" class="block text-sm font-medium text-gray-700">Description (Kannada)</label>
                            <textarea id="paragraph_kn" name="paragraph_kn" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="ವಿವರಣೆ ನಮೂದಿಸಿ">{{ old('paragraph_kn') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $sliders->count() + 1) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Display order">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                        <select id="status" name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Slider Image *</label>
                    <input type="file" id="image" name="image" accept="image/*" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                    <p class="mt-1 text-sm text-gray-500">Max size: 2MB. Formats: JPEG, PNG, JPG, GIF</p>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Add Slider Item
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Existing Slider Items -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Current Slider Items ({{ $sliders->count() }})</h3>
        </div>
        <div class="p-6">
            @if($sliders->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title (EN/KN)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($sliders as $slider)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ $slider->image_url }}" alt="{{ $slider->title_en }}" class="h-16 w-24 object-cover rounded">
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900 mb-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 mr-2">EN</span>
                                    {{ $slider->title_en }}
                                </div>
                                @if($slider->title_kn)
                                    <div class="text-sm text-gray-700">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-orange-100 text-orange-800 mr-2">KN</span>
                                        {{ $slider->title_kn }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900 mb-1">{{ Str::limit($slider->paragraph_en, 80) }}</div>
                                @if($slider->paragraph_kn)
                                    <div class="text-sm text-gray-600">{{ Str::limit($slider->paragraph_kn, 80) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $slider->sort_order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $slider->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($slider->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button onclick="editSlider({{ $slider->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                <form action="{{ route('admin.manage.slider.destroy', $slider) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this slider item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No slider items found. Add your first slider item above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">No slider items found. Add your first slider item above.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Edit Slider Item</h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                
                <!-- English Content -->
                <div class="border-l-4 border-blue-500 pl-4 mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">English Content</h4>
                    <div class="space-y-4">
                        <div>
                            <label for="edit_title_en" class="block text-sm font-medium text-gray-700">Title (English) *</label>
                            <input type="text" id="edit_title_en" name="title_en" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                        </div>
                        <div>
                            <label for="edit_paragraph_en" class="block text-sm font-medium text-gray-700">Description (English) *</label>
                            <textarea id="edit_paragraph_en" name="paragraph_en" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Kannada Content -->
                <div class="border-l-4 border-orange-500 pl-4 mb-6">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Kannada Content (ಕನ್ನಡ)</h4>
                    <div class="space-y-4">
                        <div>
                            <label for="edit_title_kn" class="block text-sm font-medium text-gray-700">Title (Kannada)</label>
                            <input type="text" id="edit_title_kn" name="title_kn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                        </div>
                        <div>
                            <label for="edit_paragraph_kn" class="block text-sm font-medium text-gray-700">Description (Kannada)</label>
                            <textarea id="edit_paragraph_kn" name="paragraph_kn" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary"></textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="edit_sort_order" class="block text-sm font-medium text-gray-700">Sort Order</label>
                        <input type="number" id="edit_sort_order" name="sort_order" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                    </div>
                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-gray-700">Status *</label>
                        <select id="edit_status" name="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label for="edit_image" class="block text-sm font-medium text-gray-700">New Image (optional)</label>
                    <input type="file" id="edit_image" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                    <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image</p>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeEditModal()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400">
                        Cancel
                    </button>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80">
                        Update Slider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
const sliders = @json($sliders);

function editSlider(id) {
    const slider = sliders.find(s => s.id === id);
    if (!slider) return;
    
    document.getElementById('edit_title_en').value = slider.title_en || '';
    document.getElementById('edit_title_kn').value = slider.title_kn || '';
    document.getElementById('edit_paragraph_en').value = slider.paragraph_en || '';
    document.getElementById('edit_paragraph_kn').value = slider.paragraph_kn || '';
    document.getElementById('edit_sort_order').value = slider.sort_order;
    document.getElementById('edit_status').value = slider.status;
    
    document.getElementById('editForm').action = `/admin/manage-slider/${id}`;
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});
</script>
@endsection
