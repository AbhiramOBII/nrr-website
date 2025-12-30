@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Welcome to the admin panel. Here\'s an overview of your website.')

@section('content')
<div class="space-y-6">
    

    <!-- Quick Actions -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Quick Actions</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('admin.sliders.index') }}" 
                   class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-sliders-h text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-blue-600">Hero Sliders</p>
                        <p class="text-sm text-gray-500">Manage homepage sliders</p>
                    </div>
                </a>

                <a href="{{ route('admin.media.index') }}" 
                   class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-images text-green-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-green-600">Media Library</p>
                        <p class="text-sm text-gray-500">Manage images and videos</p>
                    </div>
                </a>

                <a href="{{ route('admin.events.index') }}" 
                   class="flex items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-calendar-alt text-yellow-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-yellow-600">Events</p>
                        <p class="text-sm text-gray-500">Manage events and updates</p>
                    </div>
                </a>

                <a href="#" 
                   class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-cog text-purple-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-purple-600">Settings</p>
                        <p class="text-sm text-gray-500">Configure site settings</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Content Management -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Content Management</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('admin.major-developments.index') }}" 
                   class="flex items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-chart-line text-indigo-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-indigo-600">Major Developments</p>
                        <p class="text-sm text-gray-500">Manage development projects</p>
                    </div>
                </a>

                <a href="{{ route('admin.scams-exposed.index') }}" 
                   class="flex items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-red-600">Scams Exposed</p>
                        <p class="text-sm text-gray-500">Manage scam reports</p>
                    </div>
                </a>

                <a href="{{ route('admin.print-media.index') }}" 
                   class="flex items-center p-4 bg-teal-50 rounded-lg hover:bg-teal-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-newspaper text-teal-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-teal-600">Print Media</p>
                        <p class="text-sm text-gray-500">Manage print media coverage</p>
                    </div>
                </a>

                <a href="{{ route('admin.electronic-media.index') }}" 
                   class="flex items-center p-4 bg-pink-50 rounded-lg hover:bg-pink-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-video text-pink-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-pink-600">Electronic Media</p>
                        <p class="text-sm text-gray-500">Manage video content</p>
                    </div>
                </a>

                <a href="{{ route('admin.manage.enquiries') }}" 
                   class="flex items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-envelope text-orange-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-orange-600">Contact Enquiries</p>
                        <p class="text-sm text-gray-500">View contact submissions</p>
                    </div>
                </a>

                <a href="{{ route('admin.manage.gallery') }}" 
                   class="flex items-center p-4 bg-cyan-50 rounded-lg hover:bg-cyan-100 transition-colors duration-200 group">
                    <div class="flex-shrink-0">
                        <i class="fas fa-images text-cyan-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900 group-hover:text-cyan-600">Photo Gallery</p>
                        <p class="text-sm text-gray-500">Manage photo galleries</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
