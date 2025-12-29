@extends('admin.layouts.app')

@section('title', 'Media Gallery')
@section('page-title', 'Media Gallery')
@section('page-description', 'Manage images, videos, and media files')

@section('breadcrumb')
<li>
    <div class="flex items-center">
        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
        <span class="text-gray-500">Media</span>
    </div>
</li>
@endsection

@section('page-actions')
<div class="flex space-x-3">
    <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        <i class="fas fa-folder mr-2"></i>
        Create Folder
    </button>
    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
        <i class="fas fa-upload mr-2"></i>
        Upload Media
    </button>
</div>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Upload Area -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="p-6">
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-primary transition-colors duration-200">
                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Upload Media Files</h3>
                <p class="text-gray-500 mb-4">Drag and drop files here or click to browse</p>
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90">
                    <i class="fas fa-plus mr-2"></i>
                    Choose Files
                </button>
            </div>
        </div>
    </div>

    <!-- Media Grid -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Media Library</h3>
            <div class="flex items-center space-x-3">
                <select class="border border-gray-300 rounded-md text-sm">
                    <option>All Media</option>
                    <option>Images</option>
                    <option>Videos</option>
                    <option>Documents</option>
                </select>
                <div class="flex border border-gray-300 rounded-md">
                    <button class="px-3 py-2 text-sm bg-gray-50 border-r border-gray-300">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="px-3 py-2 text-sm">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- Sample Media Items -->
                <div class="group relative bg-gray-100 rounded-lg overflow-hidden aspect-square cursor-pointer hover:shadow-md transition-shadow duration-200">
                    <img src="{{ asset('image/Hero-picture.jpg') }}" alt="Hero Picture" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-200 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex space-x-2">
                            <button class="p-2 bg-white rounded-full text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 bg-white rounded-full text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 bg-white rounded-full text-red-600 hover:bg-red-50">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-2">
                        <p class="text-white text-xs truncate">Hero-picture.jpg</p>
                    </div>
                </div>

                <!-- More sample items -->
                @for($i = 2; $i <= 9; $i++)
                <div class="group relative bg-gray-100 rounded-lg overflow-hidden aspect-square cursor-pointer hover:shadow-md transition-shadow duration-200">
                    <img src="{{ asset('image/pic-' . $i . '.jpg') }}" alt="Picture {{ $i }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-200 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex space-x-2">
                            <button class="p-2 bg-white rounded-full text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 bg-white rounded-full text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 bg-white rounded-full text-red-600 hover:bg-red-50">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-2">
                        <p class="text-white text-xs truncate">pic-{{ $i }}.jpg</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
