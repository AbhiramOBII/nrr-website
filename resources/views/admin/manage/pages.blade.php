@extends('admin.layouts.app')

@section('title', 'Manage Pages')
@section('page-title', 'Manage Pages')
@section('page-description', 'Manage website pages and their content')

@section('content')
<div class="space-y-6">
    <!-- Add New Page -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Add New Page</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="page_title" class="block text-sm font-medium text-gray-700">Page Title</label>
                        <input type="text" id="page_title" name="page_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter page title">
                    </div>
                    <div>
                        <label for="page_slug" class="block text-sm font-medium text-gray-700">Page Slug</label>
                        <input type="text" id="page_slug" name="page_slug" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="page-url-slug">
                    </div>
                </div>
                <div>
                    <label for="page_meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                    <textarea id="page_meta_description" name="page_meta_description" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="SEO meta description"></textarea>
                </div>
                <div>
                    <label for="page_content" class="block text-sm font-medium text-gray-700">Page Content</label>
                    <textarea id="page_content" name="page_content" rows="8" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter page content"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="page_status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="page_status" name="page_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                    <div>
                        <label for="page_featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                        <input type="file" id="page_featured_image" name="page_featured_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Create Page
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Existing Pages -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Existing Pages</h3>
        </div>
        <div class="p-6">
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-file-alt text-4xl mb-4"></i>
                <p>No pages found. Create your first page above.</p>
            </div>
        </div>
    </div>
</div>
@endsection
