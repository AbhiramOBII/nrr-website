<!-- Top Navigation Bar -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between h-16 px-6">
        <!-- Left Section -->
        <div class="flex items-center">
            <!-- Mobile menu button -->
            <button type="button" class="md:hidden p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" id="mobile-menu-button">
                <span class="sr-only">Open main menu</span>
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Breadcrumb -->
            <nav class="hidden md:flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2">
                    <li>
                        <div>
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-400 hover:text-gray-500">
                                <i class="fas fa-home"></i>
                                <span class="sr-only">Home</span>
                            </a>
                        </div>
                    </li>
                    @if(View::hasSection('breadcrumb'))
                        @yield('breadcrumb')
                    @endif
                </ol>
            </nav>
        </div>
        
        <!-- Right Section -->
        <div class="flex items-center space-x-4">
            <!-- Quick Actions -->
            <div class="flex items-center space-x-2">
                <!-- View Site -->
                <a href="{{ route('home') }}" target="_blank" 
                   class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    View Site
                </a>
                
                <!-- Notifications -->
                <button type="button" class="p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary relative">
                    <span class="sr-only">View notifications</span>
                    <i class="fas fa-bell"></i>
                    <!-- Notification badge -->
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-400 ring-2 ring-white"></span>
                </button>
            </div>
            
            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <div>
                    <button type="button" 
                            class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" 
                            id="user-menu-button" 
                            @click="open = !open"
                            aria-expanded="false" 
                            aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </button>
                </div>
                
                <!-- Dropdown Menu -->
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50" 
                     role="menu" 
                     aria-orientation="vertical" 
                     aria-labelledby="user-menu-button" 
                     tabindex="-1">
                    
                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                        <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                        Your Profile
                    </a>
                    
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                        <i class="fas fa-cog mr-3 text-gray-400"></i>
                        Settings
                    </a>
                    
                    <div class="border-t border-gray-100"></div>
                    
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">
                            <i class="fas fa-sign-out-alt mr-3 text-gray-400"></i>
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Alpine.js for dropdown functionality -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
