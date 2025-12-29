@extends('admin.layouts.app')

@section('title', 'Manage Visual Media')
@section('page-title', 'Manage Visual Media')
@section('page-description', 'Manage images, videos, and other visual media content')

@section('content')
<div class="space-y-6">
    <!-- Upload New Media -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Upload New Media</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div>
                    <label for="media_file" class="block text-sm font-medium text-gray-700">Media File</label>
                    <input type="file" id="media_file" name="media_file" accept="image/*,video/*" multiple class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                    <p class="mt-1 text-sm text-gray-500">Select multiple images or videos to upload</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="media_title" class="block text-sm font-medium text-gray-700">Media Title</label>
                        <input type="text" id="media_title" name="media_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter media title">
                    </div>
                    <div>
                        <label for="media_category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="media_category" name="media_category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="">Select Category</option>
                            <option value="events">Events</option>
                            <option value="activities">Activities</option>
                            <option value="testimonials">Testimonials</option>
                            <option value="general">General</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="media_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="media_description" name="media_description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter media description"></textarea>
                </div>
                <div>
                    <label for="media_alt_text" class="block text-sm font-medium text-gray-700">Alt Text (for accessibility)</label>
                    <input type="text" id="media_alt_text" name="media_alt_text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Describe the image for screen readers">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Upload Media
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Media Library -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-medium text-gray-900">Media Library</h3>
            <div class="flex space-x-2">
                <select class="rounded-md border-gray-300 text-sm">
                    <option value="">All Categories</option>
                    <option value="events">Events</option>
                    <option value="activities">Activities</option>
                    <option value="testimonials">Testimonials</option>
                    <option value="general">General</option>
                </select>
                <input type="search" placeholder="Search media..." class="rounded-md border-gray-300 text-sm">
            </div>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-photo-video text-4xl mb-4"></i>
                <p>No media files found. Upload your first media file above.</p>
            </div>
        </div>
    </div>
</div>
@endsection
