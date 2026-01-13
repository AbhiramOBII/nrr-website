@extends('admin.layouts.app')

@section('title', 'Settings')
@section('page-title', 'Settings')
@section('page-description', 'Configure system settings and preferences')

@section('breadcrumb')
<li>
    <div class="flex items-center">
        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
        <span class="text-gray-500">Settings</span>
    </div>
</li>
@endsection

@section('content')
<div class="space-y-6">

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- General Settings -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">
                    <i class="fas fa-cog mr-2 text-primary"></i>
                    General Settings
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Site Name
                        </label>
                        <input type="text" 
                               id="site_name" 
                               name="site_name" 
                               value="{{ $settings['site_name'] ?? 'N. R. Ramesh Official Website' }}"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="site_tagline" class="block text-sm font-medium text-gray-700 mb-2">
                            Site Tagline
                        </label>
                        <input type="text" 
                               id="site_tagline" 
                               name="site_tagline" 
                               value="{{ $settings['site_tagline'] ?? 'Results Over Rhetoric' }}"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                </div>
                
                <div>
                    <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">
                        Site Description
                    </label>
                    <textarea id="site_description" 
                              name="site_description" 
                              rows="3"
                              class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">{{ $settings['site_description'] ?? 'Official website of N. R. Ramesh - Anti-corruption crusader and advocate for transparent governance.' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Contact Settings -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">
                    <i class="fas fa-address-book mr-2 text-primary"></i>
                    Contact Information
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Email
                        </label>
                        <input type="email" 
                               id="contact_email" 
                               name="contact_email" 
                               value="{{ $settings['contact_email'] ?? '' }}"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Phone
                        </label>
                        <input type="tel" 
                               id="contact_phone" 
                               name="contact_phone" 
                               value="{{ $settings['contact_phone'] ?? '' }}"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                </div>
                
                <div>
                    <label for="office_address" class="block text-sm font-medium text-gray-700 mb-2">
                        Office Address
                    </label>
                    <textarea id="office_address" 
                              name="office_address" 
                              rows="3"
                              class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">{{ $settings['office_address'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Social Media Settings -->
        <div class="bg-white shadow-sm rounded-lg border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">
                    <i class="fas fa-share-alt mr-2 text-primary"></i>
                    Social Media Links
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="twitter_url" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-twitter text-blue-400 mr-2"></i>
                            Twitter / X URL
                        </label>
                        <input type="url" 
                               id="twitter_url" 
                               name="twitter_url" 
                               value="{{ $settings['twitter_url'] ?? '' }}"
                               placeholder="https://x.com/username"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-facebook text-blue-600 mr-2"></i>
                            Facebook URL
                        </label>
                        <input type="url" 
                               id="facebook_url" 
                               name="facebook_url" 
                               value="{{ $settings['facebook_url'] ?? '' }}"
                               placeholder="https://facebook.com/username"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="youtube_url" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-youtube text-red-600 mr-2"></i>
                            YouTube URL
                        </label>
                        <input type="url" 
                               id="youtube_url" 
                               name="youtube_url" 
                               value="{{ $settings['youtube_url'] ?? '' }}"
                               placeholder="https://youtube.com/@channel"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="instagram_url" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fab fa-instagram text-pink-600 mr-2"></i>
                            Instagram URL
                        </label>
                        <input type="url" 
                               id="instagram_url" 
                               name="instagram_url" 
                               value="{{ $settings['instagram_url'] ?? '' }}"
                               placeholder="https://instagram.com/username"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="flex justify-end">
            <button type="submit" 
                    class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-save mr-2"></i>
                Save All Settings
            </button>
        </div>
    </form>
    
    <!-- System Status -->
    <!-- <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">System Status</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-check text-green-600 text-xl"></i>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900">Database</h4>
                    <p class="text-sm text-green-600">Connected</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-server text-green-600 text-xl"></i>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900">Server</h4>
                    <p class="text-sm text-green-600">Online</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-shield-alt text-green-600 text-xl"></i>
                    </div>
                    <h4 class="text-sm font-medium text-gray-900">Security</h4>
                    <p class="text-sm text-green-600">Secure</p>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
