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
    <!-- Settings Navigation -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-primary text-primary">
                    General
                </button>
                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    SEO
                </button>
                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Social Media
                </button>
                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Security
                </button>
            </nav>
        </div>
        
        <!-- General Settings -->
        <div class="p-6">
            <form class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="site_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Site Name
                        </label>
                        <input type="text" 
                               id="site_name" 
                               name="site_name" 
                               value="N. R. Ramesh Official Website"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="site_tagline" class="block text-sm font-medium text-gray-700 mb-2">
                            Site Tagline
                        </label>
                        <input type="text" 
                               id="site_tagline" 
                               name="site_tagline" 
                               value="Results Over Rhetoric"
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
                              class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">Official website of N. R. Ramesh - Anti-corruption crusader and advocate for transparent governance.</textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Email
                        </label>
                        <input type="email" 
                               id="contact_email" 
                               name="contact_email" 
                               value="contact@nrramesh.com"
                               class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">
                    </div>
                    
                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Phone
                        </label>
                        <input type="tel" 
                               id="contact_phone" 
                               name="contact_phone" 
                               value="+91 98765 43210"
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
                              class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary">Bengaluru South, Karnataka, India</textarea>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        <i class="fas fa-save mr-2"></i>
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- System Status -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
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
    </div>
</div>
@endsection
