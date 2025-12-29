@extends('admin.layouts.app')

@section('title', 'Manage Gallery')
@section('page-title', 'Manage Gallery')
@section('page-description', 'Manage photo galleries and image collections')

@section('content')
<div class="space-y-6">
    <!-- Create New Gallery -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Create New Gallery</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="gallery_name" class="block text-sm font-medium text-gray-700">Gallery Name</label>
                        <input type="text" id="gallery_name" name="gallery_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter gallery name">
                    </div>
                    <div>
                        <label for="gallery_date" class="block text-sm font-medium text-gray-700">Event Date</label>
                        <input type="date" id="gallery_date" name="gallery_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                    </div>
                </div>
                <div>
                    <label for="gallery_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="gallery_description" name="gallery_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter gallery description"></textarea>
                </div>
                <div>
                    <label for="gallery_images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                    <input type="file" id="gallery_images" name="gallery_images[]" accept="image/*" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                    <p class="mt-1 text-sm text-gray-500">Select multiple images to upload to this gallery</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="gallery_status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="gallery_status" name="gallery_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                    <div>
                        <label for="gallery_featured" class="block text-sm font-medium text-gray-700">Featured Gallery</label>
                        <select id="gallery_featured" name="gallery_featured" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Create Gallery
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Existing Galleries -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-900">Existing Galleries</h3>
            <div class="flex space-x-2">
                <select class="rounded-md border-gray-300 text-sm">
                    <option value="">All Status</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
                <input type="search" placeholder="Search galleries..." class="rounded-md border-gray-300 text-sm">
            </div>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-images text-4xl mb-4"></i>
                <p>No galleries found. Create your first gallery above.</p>
            </div>
        </div>
    </div>
</div>
@endsection
