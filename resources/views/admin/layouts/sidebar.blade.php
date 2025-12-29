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
            
            <!-- 1. Manage Home -->
            <div class="space-y-1 mt-6">
                <div class="flex items-center px-4 py-2 text-white/80 text-sm font-semibold uppercase tracking-wider">
                    <i class="fas fa-home w-4 h-4 text-white"></i>
                    <span class="ml-3 text-white">Manage Home</span>
                </div>
                
                <a href="{{ route('admin.manage.slider') }}" 
                   class="flex items-center px-4 py-3 ml-4 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-sliders-h w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Slider</span>
                </a>
                
                <a href="{{ route('admin.manage.hero.content') }}" 
                   class="flex items-center px-4 py-3 ml-4 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-star w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Hero Content</span>
                </a>
                
                <a href="{{ route('admin.manage.impact.numbers') }}" 
                   class="flex items-center px-4 py-3 ml-4 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-chart-bar w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Impact Numbers</span>
                </a>
                
                <a href="{{ route('admin.manage.mission') }}" 
                   class="flex items-center px-4 py-3 ml-4 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-bullseye w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Mission</span>
                </a>
            </div>
            
            <!-- 2. Manage Pages -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.manage.pages') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-file-alt w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Pages</span>
                </a>
            </div>
            
            <!-- 3. Manage Visual Media -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.manage.visual.media') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-photo-video w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Visual Media</span>
                </a>
            </div>
            
            <!-- 4. Manage Paper Clips -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.manage.paper.clips') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-paperclip w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Paper Clips</span>
                </a>
            </div>
            
            <!-- 5. Manage Gallery -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.manage.gallery') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-images w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Gallery</span>
                </a>
            </div>
            
            <!-- 6. Manage Enquiries -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.manage.enquiries') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-envelope w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Enquiries</span>
                </a>
            </div>
            
            <!-- 7. Manage Newsletter Subscription -->
            <div class="space-y-1 mt-6">
                <a href="{{ route('admin.manage.newsletter') }}" 
                   class="flex items-center px-4 py-3 text-white rounded-lg transition-colors duration-200 hover:bg-primary/80">
                    <i class="fas fa-newspaper w-5 h-5"></i>
                    <span class="ml-3 font-medium">Manage Newsletter Subscription</span>
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Bottom Section -->
    <div class="absolute bottom-0 w-64 p-4 border-t border-primary/20">
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
    </div>
</div>
