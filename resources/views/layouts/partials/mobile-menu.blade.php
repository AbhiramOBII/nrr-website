<!-- Enhanced Mobile Navigation Menu -->
<div class="md:hidden fixed inset-0 z-50 hidden" id="mobile-menu">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm" id="mobile-backdrop"></div>
    
    <!-- Mobile Panel -->
    <div class="fixed top-0 right-0 h-full w-80 max-w-[85vw] bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto" id="mobile-panel">
        <!-- Mobile Header -->
        <div class="bg-header-orange px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('image/bjp-logo.svg') }}" alt="N. R. Ramesh Logo" class="h-8 w-8 object-contain">
                <h2 class="text-white font-bold text-lg">N. R. Ramesh</h2>
            </div>
            <button class="text-white hover:text-orange-300 p-2 rounded-lg transition-colors" id="mobile-close-btn">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Navigation Links -->
        <nav class="px-6 py-4">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-header-orange rounded-lg transition-all duration-200 font-medium">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-header-orange rounded-lg transition-all duration-200 font-medium">
                        <i class="fas fa-user w-5 h-5 mr-3"></i>
                        About
                    </a>
                </li>
                
                <!-- Major Development Dropdown -->
                <li>
                    <button onclick="toggleMobileSubmenu('development')" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-header-orange rounded-lg transition-all duration-200 font-medium">
                        <div class="flex items-center">
                            <i class="fas fa-building w-5 h-5 mr-3"></i>
                            Major Development
                        </div>
                        <i class="fas fa-chevron-down w-4 h-4 transition-transform duration-200" id="development-arrow"></i>
                    </button>
                    <ul class="ml-8 mt-2 space-y-1 hidden" id="development-submenu">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Yedeyur Bio-Methanization Plant</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Yedeyur Lake Development</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Sardar Vallabhbhai Academy</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Sushruta Children's Hospital</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Prakruthi Vana</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Ranadheera Kanteerava Park</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Navathare Badminton Academy</a></li>
                    </ul>
                </li>
                
                <!-- Scams Exposed Dropdown -->
                <li>
                    <button onclick="toggleMobileSubmenu('scams')" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-header-orange rounded-lg transition-all duration-200 font-medium">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle w-5 h-5 mr-3"></i>
                            Scams Exposed
                        </div>
                        <i class="fas fa-chevron-down w-4 h-4 transition-transform duration-200" id="scams-arrow"></i>
                    </button>
                    <ul class="ml-8 mt-2 space-y-1 hidden" id="scams-submenu">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Krushi Bhagya Scam</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Indira Canteen Scam</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Robert Vadra & DLF Scam</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Sam Pitroda Land Grabbing</a></li>
                    </ul>
                </li>
                
                <!-- News and Events Dropdown -->
                <li>
                    <button onclick="toggleMobileSubmenu('news')" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-header-orange rounded-lg transition-all duration-200 font-medium">
                        <div class="flex items-center">
                            <i class="fas fa-newspaper w-5 h-5 mr-3"></i>
                            News and Events
                        </div>
                        <i class="fas fa-chevron-down w-4 h-4 transition-transform duration-200" id="news-arrow"></i>
                    </button>
                    <ul class="ml-8 mt-2 space-y-1 hidden" id="news-submenu">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Print Media</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Visual Media</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-600 hover:text-header-orange transition-colors">Events & Updates</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-50 hover:text-header-orange rounded-lg transition-all duration-200 font-medium">
                        <i class="fas fa-envelope w-5 h-5 mr-3"></i>
                        Contact
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- Mobile Footer -->
        <div class="px-6 py-4 border-t border-gray-200 mt-8">
            <div class="text-center">
                <p class="text-sm text-gray-500 mb-2">Follow Us</p>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-400 hover:text-blue-500 transition-colors">
                        <i class="fab fa-facebook-f w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <i class="fab fa-twitter w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-red-500 transition-colors">
                        <i class="fab fa-youtube w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-pink-500 transition-colors">
                        <i class="fab fa-instagram w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
