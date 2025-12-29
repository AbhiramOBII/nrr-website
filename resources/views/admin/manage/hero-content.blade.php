@extends('admin.layouts.app')

@section('title', 'Manage Hero Content')
@section('page-title', 'Manage Hero Content')
@section('page-description', 'Manage homepage hero section content and messaging')

@section('content')
<div class="space-y-6">
    <!-- Hero Content Form -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Hero Section Content</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div>
                    <label for="hero_title" class="block text-sm font-medium text-gray-700">Main Title</label>
                    <input type="text" id="hero_title" name="hero_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter main hero title">
                </div>
                <div>
                    <label for="hero_subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
                    <input type="text" id="hero_subtitle" name="hero_subtitle" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter hero subtitle">
                </div>
                <div>
                    <label for="hero_description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="hero_description" name="hero_description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter hero section description"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="hero_button_text" class="block text-sm font-medium text-gray-700">Button Text</label>
                        <input type="text" id="hero_button_text" name="hero_button_text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="e.g., Learn More">
                    </div>
                    <div>
                        <label for="hero_button_link" class="block text-sm font-medium text-gray-700">Button Link</label>
                        <input type="url" id="hero_button_link" name="hero_button_link" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="https://example.com">
                    </div>
                </div>
                <div>
                    <label for="hero_background" class="block text-sm font-medium text-gray-700">Background Image</label>
                    <input type="file" id="hero_background" name="hero_background" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Update Hero Content
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Current Hero Content Preview</h3>
        </div>
        <div class="p-6">
            <div class="bg-gray-100 rounded-lg p-8 text-center">
                <i class="fas fa-star text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Hero content preview will appear here after saving changes.</p>
            </div>
        </div>
    </div>
</div>
@endsection
