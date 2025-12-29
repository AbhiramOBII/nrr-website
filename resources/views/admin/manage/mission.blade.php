@extends('admin.layouts.app')

@section('title', 'Manage Mission')
@section('page-title', 'Manage Mission')
@section('page-description', 'Manage organization mission statement and vision content')

@section('content')
<div class="space-y-6">
    <!-- Mission Content Form -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Mission & Vision Content</h3>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div>
                    <label for="mission_title" class="block text-sm font-medium text-gray-700">Mission Title</label>
                    <input type="text" id="mission_title" name="mission_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Our Mission">
                </div>
                <div>
                    <label for="mission_statement" class="block text-sm font-medium text-gray-700">Mission Statement</label>
                    <textarea id="mission_statement" name="mission_statement" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter your organization's mission statement"></textarea>
                </div>
                <div>
                    <label for="vision_title" class="block text-sm font-medium text-gray-700">Vision Title</label>
                    <input type="text" id="vision_title" name="vision_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Our Vision">
                </div>
                <div>
                    <label for="vision_statement" class="block text-sm font-medium text-gray-700">Vision Statement</label>
                    <textarea id="vision_statement" name="vision_statement" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter your organization's vision statement"></textarea>
                </div>
                <div>
                    <label for="values_title" class="block text-sm font-medium text-gray-700">Values Title</label>
                    <input type="text" id="values_title" name="values_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Our Values">
                </div>
                <div>
                    <label for="values_content" class="block text-sm font-medium text-gray-700">Values Content</label>
                    <textarea id="values_content" name="values_content" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary" placeholder="Enter your organization's core values"></textarea>
                </div>
                <div>
                    <label for="mission_image" class="block text-sm font-medium text-gray-700">Mission Section Image</label>
                    <input type="file" id="mission_image" name="mission_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary/80">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/80 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Update Mission Content
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Mission Preview -->
    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Current Mission Content Preview</h3>
        </div>
        <div class="p-6">
            <div class="bg-gray-100 rounded-lg p-8 text-center">
                <i class="fas fa-bullseye text-4xl text-gray-400 mb-4"></i>
                <p class="text-gray-500">Mission content preview will appear here after saving changes.</p>
            </div>
        </div>
    </div>
</div>
@endsection
