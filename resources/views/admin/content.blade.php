@extends('admin.layouts.app')

@section('title', 'Content Management')
@section('page-title', 'Content Management')
@section('page-description', 'Manage pages, sections, and website content')

@section('breadcrumb')
<li>
    <div class="flex items-center">
        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
        <span class="text-gray-500">Content</span>
    </div>
</li>
@endsection

@section('page-actions')
<div class="flex space-x-3">
    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        <i class="fas fa-download mr-2"></i>
        Export Content
    </button>
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        <i class="fas fa-plus mr-2"></i>
        Add New Content
    </button>
</div>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Content Sections -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Website Sections</h3>
            <p class="text-sm text-gray-500 mt-1">Manage different sections of your website</p>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Hero Section -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium text-gray-900">Hero Slider</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Main homepage slider with campaign messages</p>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-primary text-white px-3 py-2 rounded text-sm hover:bg-primary/90 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </button>
                        <button class="px-3 py-2 border border-gray-300 rounded text-sm hover:bg-gray-50 transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- About Section -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium text-gray-900">About Section</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Biography and achievements of N. R. Ramesh</p>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-primary text-white px-3 py-2 rounded text-sm hover:bg-primary/90 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </button>
                        <button class="px-3 py-2 border border-gray-300 rounded text-sm hover:bg-gray-50 transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Impact Counter -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium text-gray-900">Impact Numbers</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Statistics and achievements counter</p>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-primary text-white px-3 py-2 rounded text-sm hover:bg-primary/90 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </button>
                        <button class="px-3 py-2 border border-gray-300 rounded text-sm hover:bg-gray-50 transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Mission Section -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium text-gray-900">Mission & Vision</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Mission points and vision statement</p>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-primary text-white px-3 py-2 rounded text-sm hover:bg-primary/90 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </button>
                        <button class="px-3 py-2 border border-gray-300 rounded text-sm hover:bg-gray-50 transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Video Gallery -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium text-gray-900">Video Gallery</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">YouTube videos and media content</p>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-primary text-white px-3 py-2 rounded text-sm hover:bg-primary/90 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </button>
                        <button class="px-3 py-2 border border-gray-300 rounded text-sm hover:bg-gray-50 transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- News Section -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="text-lg font-medium text-gray-900">News & Articles</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Active
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Press coverage and news articles</p>
                    <div class="flex space-x-2">
                        <button class="flex-1 bg-primary text-white px-3 py-2 rounded text-sm hover:bg-primary/90 transition-colors">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </button>
                        <button class="px-3 py-2 border border-gray-300 rounded text-sm hover:bg-gray-50 transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Changes -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Recent Changes</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-edit text-blue-600 text-sm"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Homepage content updated</p>
                            <p class="text-sm text-gray-500">Hero slider and about section modified</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">Just now</p>
                        <p class="text-xs text-gray-400">by Admin</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-plus text-green-600 text-sm"></i>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">New impact statistics added</p>
                            <p class="text-sm text-gray-500">Updated counter section with latest numbers</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500">2 hours ago</p>
                        <p class="text-xs text-gray-400">by Admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
