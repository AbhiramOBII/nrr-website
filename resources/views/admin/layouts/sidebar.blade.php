<!-- Sidebar -->
<div class="bg-primary w-64 min-h-screen shadow-lg">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 bg-primary border-b border-primary/20">
        <div class="flex items-center">
            <img src="{{ asset('image/logo-NRR.webp') }}" alt="NRR Logo" class="h-8 w-auto">
            <span class="ml-2 text-white font-bold text-lg">Admin Panel</span>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="mt-8">
        <div class="px-4 space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                <i class="fas fa-tachometer-alt w-5 h-5"></i>
                <span class="ml-3 font-medium">Dashboard</span>
            </a>
            
            <!-- Sliders -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.sliders.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.sliders.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-images w-5 h-5"></i>
                    <span class="ml-3 font-medium">Homepage Sliders</span>
                </a>
            </div>
            
            <!-- Media Library -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.media.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.media.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-photo-video w-5 h-5"></i>
                    <span class="ml-3 font-medium">Media Library</span>
                </a>
            </div>
            
            <!-- Major Developments -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.major-developments.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.major-developments.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-building w-5 h-5"></i>
                    <span class="ml-3 font-medium">Major Developments</span>
                </a>
            </div>
            
            <!-- Scams Exposed -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.scams-exposed.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.scams-exposed.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-exclamation-triangle w-5 h-5"></i>
                    <span class="ml-3 font-medium">Scams Exposed</span>
                </a>
            </div>
            
            <!-- Events -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.events.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.events.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-calendar-alt w-5 h-5"></i>
                    <span class="ml-3 font-medium">Events</span>
                </a>
            </div>
            
            <!-- Print Media -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.print-media.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.print-media.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-newspaper w-5 h-5"></i>
                    <span class="ml-3 font-medium">Print Media</span>
                </a>
            </div>
            
            <!-- Electronic Media -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.electronic-media.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.electronic-media.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fab fa-youtube w-5 h-5"></i>
                    <span class="ml-3 font-medium">Electronic Media</span>
                </a>
            </div>
            
            <!-- Photo Gallery -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.photo-gallery.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.photo-gallery.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-images w-5 h-5"></i>
                    <span class="ml-3 font-medium">Photo Gallery</span>
                </a>
            </div>
            
            <!-- Official Media -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.official-media.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.official-media.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-bullhorn w-5 h-5"></i>
                    <span class="ml-3 font-medium">Official Media</span>
                </a>
            </div>
            
            <!-- Blogs -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.blogs.index') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.blogs.*') ? 'bg-header-orange shadow-md' : 'hover:bg-primary/80' }}">
                    <i class="fas fa-blog w-5 h-5"></i>
                    <span class="ml-3 font-medium">Blogs</span>
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Bottom Section -->
    <!-- <div class="absolute bottom-0 w-64 p-4 border-t border-primary/20">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-header-orange rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
            </div>
            <div class="ml-3">
                <p class="text-white text-sm font-medium">{{ Auth::user()->name }}</p>
                <p class="text-white/60 text-xs">Super Administrator</p>
            </div>
        </div>
    </div> -->
</div>
