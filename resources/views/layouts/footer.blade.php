
   <!-- Footer -->
   <footer class="bg-gray-900 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- About Ramesh N R - 3/12 -->
            <div class="md:col-span-3">
                <div class="flex items-center space-x-3 mb-6">
                    <img src="{{ asset('image/bjp-logo.svg') }}" alt="N. R. Ramesh Logo" class="h-8 w-8 object-contain">
                    <h3 class="text-xl font-bold">{{ __('messages.name') }}</h3>
                </div>
                <p class="text-gray-300 text-base leading-relaxed mb-4">
                    {{ __('messages.footer_about') }}
                </p>
                <div class="text-gray-400 text-sm">
                    <p>© 2025 N. R. Ramesh</p>
                    <p>{{ __('messages.all_rights_reserved') }}</p>
                </div>
            </div>

            <!-- Quick Links - 3/12 -->
            <div class="md:col-span-3">
                <h3 class="text-lg font-semibold mb-6">{{ __('messages.quick_links') }}</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors text-base">{{ __('messages.about') }}</a></li>
                    <li><a href="{{ route('events.index') }}" class="text-gray-300 hover:text-white transition-colors text-base">{{ __('messages.events') }}</a></li>
                    <li><a href="{{ route('print-media.index') }}" class="text-gray-300 hover:text-white transition-colors text-base">{{ __('messages.print_media') }}</a></li>
                    <li><a href="{{ route('photo-gallery.index') }}" class="text-gray-300 hover:text-white transition-colors text-base">{{ __('messages.photo_gallery') }}</a></li>
                    <li><a href="{{ route('electronic-media.index') }}" class="text-gray-300 hover:text-white transition-colors text-base">{{ __('messages.electronic_media') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors text-base">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>

            <!-- Social Links & Newsletter - 6/12 -->
            <div class="md:col-span-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Social Links -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6">{{ __('messages.follow_us') }}</h3>
                        <div class="flex flex-col space-y-4">
                            @if(!empty($siteSettings['twitter_url']))
                            <a href="{{ $siteSettings['twitter_url'] }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group" target="_blank">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </div>
                                <span class="text-base">Twitter</span>
                            </a>
                            @endif
                            @if(!empty($siteSettings['facebook_url']))
                            <a href="{{ $siteSettings['facebook_url'] }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group" target="_blank">
                                <div class="w-8 h-8 bg-blue-700 rounded-full flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </div>
                                <span class="text-base">Facebook</span>
                            </a>
                            @endif
                            @if(!empty($siteSettings['youtube_url']))
                            <a href="{{ $siteSettings['youtube_url'] }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group" target="_blank">
                                <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center group-hover:bg-red-500 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                    </svg>
                                </div>
                                <span class="text-base">YouTube</span>
                            </a>
                            @endif
                            @if(!empty($siteSettings['instagram_url']))
                            <a href="{{ $siteSettings['instagram_url'] }}" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group" target="_blank">
                                <div class="w-8 h-8 bg-pink-600 rounded-full flex items-center justify-center group-hover:bg-pink-500 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1 1 12.324 0 6.162 6.162 0 0 1-12.324 0zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm4.965-10.405a1.44 1.44 0 1 1 2.881.001 1.44 1.44 0 0 1-2.881-.001z"/>
                                    </svg>
                                </div>
                                <span class="text-base">Instagram</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Newsletter Subscription -->
                    <div>
                        <h3 class="text-lg font-semibold mb-6">{{ __('messages.subscribe_newsletter') }}</h3>
                        <p class="text-gray-300 text-base mb-4">{{ __('messages.newsletter_desc') }}</p>
                        <form class="space-y-3">
                            <div>
                                <input type="email" placeholder="{{ __('messages.enter_email') }}" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors">
                            </div>
                            <button type="submit" class="w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                {{ __('messages.subscribe') }}
                            </button>
                        </form>
                        <p class="text-sm text-gray-400 mt-3">
                            {{ __('messages.privacy_respect') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center text-base text-gray-400">
                <div class="flex flex-col items-center md:items-start">
                    <p>© 2025 N. R. Ramesh. {{ __('messages.all_rights_reserved') }}</p>
                    <p class="text-sm mt-1">
                        {{ __('messages.proudly_powered_by') }} 
                        <a href="https://www.obiikriationz.com" target="_blank" rel="noopener noreferrer" class="text-orange-400 hover:text-orange-300 transition-colors font-medium">
                            Obii Kriationz Web LLP
                        </a>
                    </p>
                </div>
                <div class="flex space-x-6 mt-2 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">{{ __('messages.terms_of_service') }}</a>
                    <a href="#" class="hover:text-white transition-colors">{{ __('messages.privacy_policy') }}</a>
                    <a href="#" class="hover:text-white transition-colors">{{ __('messages.disclaimer') }}</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Paper Clip Modal -->
<div id="clipModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-2xl max-w-4xl max-h-[90vh] w-full mx-4 overflow-hidden shadow-2xl">
        <!-- Modal Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <span id="modalPublication" class="text-indigo-600 font-bold text-sm"></span>
                <span id="modalDate" class="text-gray-400 text-sm"></span>
            </div>
            <button onclick="closeClipModal()" class="text-gray-400 hover:text-gray-600 transition-colors p-2 hover:bg-gray-100 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Modal Content -->
        <div class="p-6">
            <!-- Image Container -->
            <div class="mb-6">
                <img id="modalImage" src="" alt="" class="w-full h-auto max-h-[60vh] object-contain rounded-lg shadow-lg">
            </div>
            
            <!-- Article Title -->
            <h2 id="modalTitle" class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight"></h2>
            
            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-gray-100">
                <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Read Full Article
                </button>
                <button onclick="shareArticle()" class="text-gray-600 hover:text-gray-800 px-4 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                    </svg>
                    Share
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>


    <!-- JavaScript for mobile menu toggle and slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Counter Animation Function
            function animateCounters() {
                const counters = document.querySelectorAll('.counter');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const counter = entry.target;
                            const target = parseInt(counter.getAttribute('data-target'));
                            let current = 0;
                            const increment = target / 100;
                            const timer = setInterval(() => {
                                current += increment;
                                if (current >= target) {
                                    counter.textContent = target.toLocaleString();
                                    clearInterval(timer);
                                } else {
                                    counter.textContent = Math.floor(current).toLocaleString();
                                }
                            }, 20);
                            observer.unobserve(counter);
                        }
                    });
                }, {
                    threshold: 0.5
                });

                counters.forEach(counter => {
                    observer.observe(counter);
                });
            }

            // Initialize counter animation
            animateCounters();

            // YouTube Carousel Functionality
            let currentVideoIndex = 0;
            const totalVideos = 3;

            window.nextVideo = function() {
                currentVideoIndex = (currentVideoIndex + 1) % totalVideos;
                updateCarousel();
            };

            window.previousVideo = function() {
                currentVideoIndex = (currentVideoIndex - 1 + totalVideos) % totalVideos;
                updateCarousel();
            };

            window.goToVideo = function(index) {
                currentVideoIndex = index;
                updateCarousel();
            };

            window.openVideo = function(videoId) {
                window.open(`https://www.youtube.com/watch?v=${videoId}`, '_blank');
            };

            function updateCarousel() {
                const carousel = document.getElementById('youtube-carousel');
                const translateX = -currentVideoIndex * 100;
                carousel.style.transform = `translateX(${translateX}%)`;

                // Update dots
                for (let i = 0; i < totalVideos; i++) {
                    const dot = document.getElementById(`dot-${i}`);
                    if (i === currentVideoIndex) {
                        dot.className = 'w-3 h-3 rounded-full bg-header-orange transition-all duration-300';
                    } else {
                        dot.className = 'w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 transition-all duration-300';
                    }
                }
            }

            // Auto-play carousel (optional)
            setInterval(() => {
                nextVideo();
            }, 8000); // Change video every 8 seconds

            // Paper Clips Modal Functionality
            window.openClipModal = function(clipId) {
                const modal = document.getElementById('clipModal');
                const modalImage = document.getElementById('modalImage');
                const modalTitle = document.getElementById('modalTitle');
                const modalPublication = document.getElementById('modalPublication');
                const modalDate = document.getElementById('modalDate');
                
                // Define clip data
                const clipData = {
                    'clip1': {
                        image: 'image/pic-7.jpg',
                        title: 'Major Corruption Scam Exposed in BBMP',
                        publication: 'THE HINDU',
                        date: 'Sep 03, 2025'
                    },
                    'clip2': {
                        image: 'image/pic-2.jpg',
                        title: 'Transforming Public Administration',
                        publication: 'GOVERNANCE TODAY',
                        date: 'Sep 01, 2025'
                    },
                    'clip3': {
                        image: 'image/pic-3.jpg',
                        title: 'Record-Breaking Job Fair Success',
                        publication: 'PRESS RELEASE',
                        date: 'Aug 31, 2025'
                    },
                    'clip4': {
                        image: 'image/pic-4.jpg',
                        title: 'Public Land Recovery Initiative',
                        publication: 'DECCAN HERALD',
                        date: 'Aug 28, 2025'
                    },
                    'clip5': {
                        image: 'image/pic-5.jpg',
                        title: 'Annual Transparency Report Released',
                        publication: 'TIMES OF INDIA',
                        date: 'Aug 25, 2025'
                    }
                };
                
                const clip = clipData[clipId];
                if (clip) {
                    modalImage.src = clip.image;
                    modalImage.alt = clip.title;
                    modalTitle.textContent = clip.title;
                    modalPublication.textContent = clip.publication;
                    modalDate.textContent = clip.date;
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            };
            
            // Close modal functionality
            window.closeClipModal = function() {
                const modal = document.getElementById('clipModal');
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            };
            
            // Share functionality
            window.shareArticle = function() {
                const modalTitle = document.getElementById('modalTitle').textContent;
                const modalPublication = document.getElementById('modalPublication').textContent;
                const modalDate = document.getElementById('modalDate').textContent;
                
                const shareText = `${modalTitle} - ${modalPublication} (${modalDate})`;
                const shareUrl = window.location.href;
                
                // Check if Web Share API is supported
                if (navigator.share) {
                    navigator.share({
                        title: modalTitle,
                        text: shareText,
                        url: shareUrl
                    }).catch(err => console.log('Error sharing:', err));
                } else {
                    // Fallback: Copy to clipboard
                    const textToCopy = `${shareText}\n${shareUrl}`;
                    navigator.clipboard.writeText(textToCopy).then(() => {
                        // Show success message
                        showShareSuccess();
                    }).catch(() => {
                        // Fallback for older browsers
                        const textArea = document.createElement('textarea');
                        textArea.value = textToCopy;
                        document.body.appendChild(textArea);
                        textArea.select();
                        document.execCommand('copy');
                        document.body.removeChild(textArea);
                        showShareSuccess();
                    });
                }
            };
            
            // Show share success message
            function showShareSuccess() {
                const successMsg = document.createElement('div');
                successMsg.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-[60] transform translate-x-full transition-transform duration-300';
                successMsg.innerHTML = `
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Article link copied to clipboard!
                    </div>
                `;
                document.body.appendChild(successMsg);
                
                // Animate in
                setTimeout(() => {
                    successMsg.style.transform = 'translateX(0)';
                }, 100);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    successMsg.style.transform = 'translateX(full)';
                    setTimeout(() => {
                        document.body.removeChild(successMsg);
                    }, 300);
                }, 3000);
            }


            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobilePanel = document.getElementById('mobile-panel');
            const mobileBackdrop = document.getElementById('mobile-backdrop');
            const mobileCloseBtn = document.getElementById('mobile-close-btn');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');

            function openMobileMenu() {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    mobilePanel.style.transform = 'translateX(0)';
                }, 10);
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            }

            function closeMobileMenu() {
                mobilePanel.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = 'auto';
                }, 300);
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }

            function toggleMobileSubmenu(submenuId) {
                const submenu = document.getElementById(submenuId + '-submenu');
                const arrow = document.getElementById(submenuId + '-arrow');
                
                if (submenu.classList.contains('hidden')) {
                    submenu.classList.remove('hidden');
                    arrow.style.transform = 'rotate(180deg)';
                } else {
                    submenu.classList.add('hidden');
                    arrow.style.transform = 'rotate(0deg)';
                }
            }

            // Event listeners
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', openMobileMenu);
            }
            
            if (mobileCloseBtn) {
                mobileCloseBtn.addEventListener('click', closeMobileMenu);
            }
            
            if (mobileBackdrop) {
                mobileBackdrop.addEventListener('click', closeMobileMenu);
            }

            // Make toggleMobileSubmenu globally available
            window.toggleMobileSubmenu = toggleMobileSubmenu;

            // Language dropdown functionality moved to header.blade.php


            // Slider functionality
            const sliderTrack = document.getElementById('slider-track');
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.slider-dot');
            const prevBtn = document.getElementById('slider-prev');
            const nextBtn = document.getElementById('slider-next');
            let currentSlide = 0;
            let autoSlideInterval;

            function updateSlider() {
                const translateX = -currentSlide * 100;
                sliderTrack.style.transform = `translateX(${translateX}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                    if (index === currentSlide) {
                        dot.classList.remove('bg-white/50');
                        dot.classList.add('bg-white');
                    } else {
                        dot.classList.remove('bg-white');
                        dot.classList.add('bg-white/50');
                    }
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                updateSlider();
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                updateSlider();
            }

            function goToSlide(index) {
                currentSlide = index;
                updateSlider();
            }

            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 7000);
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            // Event listeners
            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    nextSlide();
                    stopAutoSlide();
                    startAutoSlide();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    prevSlide();
                    stopAutoSlide();
                    startAutoSlide();
                });
            }

            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', function() {
                    goToSlide(index);
                    stopAutoSlide();
                    startAutoSlide();
                });
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(event) {
                if (event.key === 'ArrowLeft') {
                    prevSlide();
                    stopAutoSlide();
                    startAutoSlide();
                } else if (event.key === 'ArrowRight') {
                    nextSlide();
                    stopAutoSlide();
                    startAutoSlide();
                }
            });

            // Pause auto-slide on hover
            const sliderContainer = document.querySelector('.slider-container');
            if (sliderContainer) {
                sliderContainer.addEventListener('mouseenter', stopAutoSlide);
                sliderContainer.addEventListener('mouseleave', startAutoSlide);
            }

            // Touch/swipe support for mobile
            let startX = 0;
            let endX = 0;

            sliderContainer.addEventListener('touchstart', function(e) {
                startX = e.touches[0].clientX;
            });

            sliderContainer.addEventListener('touchend', function(e) {
                endX = e.changedTouches[0].clientX;
                handleSwipe();
            });

            function handleSwipe() {
                const threshold = 50;
                const diff = startX - endX;

                if (Math.abs(diff) > threshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        prevSlide();
                    }
                    stopAutoSlide();
                    startAutoSlide();
                }
            }

            // Initialize slider
            updateSlider();
            startAutoSlide();

            // Full Width Infinite Gallery Carousel functionality
            const galleryTrack = document.getElementById('gallery-track');
            const gallerySlides = document.querySelectorAll('.gallery-slide');
            const galleryPrevBtn = document.getElementById('gallery-prev');
            const galleryNextBtn = document.getElementById('gallery-next');
            const galleryIndicators = document.getElementById('gallery-indicators');
            const galleryCounter = document.getElementById('gallery-counter');
            
            let galleryCurrentIndex = 0;
            let galleryAutoInterval;
            const totalSlides = gallerySlides.length;

            // Clone slides for seamless infinite effect
            function setupInfiniteGallery() {
                // Clone first slide and append to end
                const firstClone = gallerySlides[0].cloneNode(true);
                galleryTrack.appendChild(firstClone);
                
                // Clone last slide and prepend to beginning
                const lastClone = gallerySlides[totalSlides - 1].cloneNode(true);
                galleryTrack.insertBefore(lastClone, galleryTrack.firstChild);
                
                // Set initial position (start at first real slide)
                galleryCurrentIndex = 1;
                updateGalleryPosition(false);
            }

            // Create indicator dots
            function createGalleryIndicators() {
                galleryIndicators.innerHTML = '';
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('button');
                    dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${i === 0 ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/75'}`;
                    dot.addEventListener('click', () => goToGallerySlide(i));
                    galleryIndicators.appendChild(dot);
                }
            }

            // Update gallery position
            function updateGalleryPosition(animate = true) {
                const offset = -galleryCurrentIndex * 100; // 100% per slide for full width
                if (animate) {
                    galleryTrack.style.transition = 'transform 0.7s ease-in-out';
                } else {
                    galleryTrack.style.transition = 'none';
                }
                galleryTrack.style.transform = `translateX(${offset}%)`;
                
                // Update indicators and counter
                const realIndex = galleryCurrentIndex === 0 ? totalSlides - 1 : 
                                galleryCurrentIndex === totalSlides + 1 ? 0 : 
                                galleryCurrentIndex - 1;
                
                const dots = galleryIndicators.querySelectorAll('button');
                dots.forEach((dot, index) => {
                    if (index === realIndex) {
                        dot.className = 'w-3 h-3 rounded-full bg-white scale-125 transition-all duration-300';
                    } else {
                        dot.className = 'w-3 h-3 rounded-full bg-white/50 hover:bg-white/75 transition-all duration-300';
                    }
                });

                // Update counter
                if (galleryCounter) {
                    galleryCounter.textContent = `${realIndex + 1} / ${totalSlides}`;
                }
            }

            // Go to specific slide
            function goToGallerySlide(index) {
                galleryCurrentIndex = index + 1; // +1 because of cloned slide at beginning
                updateGalleryPosition();
            }

            // Next slide
            function nextGallerySlide() {
                galleryCurrentIndex++;
                updateGalleryPosition();
                
                // Check if we need to reset position for infinite loop
                setTimeout(() => {
                    if (galleryCurrentIndex > totalSlides) {
                        galleryCurrentIndex = 1;
                        updateGalleryPosition(false);
                    }
                }, 700);
            }

            // Previous slide
            function prevGallerySlide() {
                galleryCurrentIndex--;
                updateGalleryPosition();
                
                // Check if we need to reset position for infinite loop
                setTimeout(() => {
                    if (galleryCurrentIndex < 1) {
                        galleryCurrentIndex = totalSlides;
                        updateGalleryPosition(false);
                    }
                }, 700);
            }

            // Auto-play functionality
            function startGalleryAutoPlay() {
                galleryAutoInterval = setInterval(() => {
                    nextGallerySlide();
                }, 5000);
            }

            function stopGalleryAutoPlay() {
                clearInterval(galleryAutoInterval);
            }

            // Event listeners
            if (galleryNextBtn) {
                galleryNextBtn.addEventListener('click', () => {
                    nextGallerySlide();
                    stopGalleryAutoPlay();
                    startGalleryAutoPlay();
                });
            }

            if (galleryPrevBtn) {
                galleryPrevBtn.addEventListener('click', () => {
                    prevGallerySlide();
                    stopGalleryAutoPlay();
                    startGalleryAutoPlay();
                });
            }

            // Pause on hover
            if (galleryTrack) {
                galleryTrack.addEventListener('mouseenter', stopGalleryAutoPlay);
                galleryTrack.addEventListener('mouseleave', startGalleryAutoPlay);
            }

            // Touch/swipe support
            let galleryStartX = 0;
            let galleryEndX = 0;

            if (galleryTrack) {
                galleryTrack.addEventListener('touchstart', (e) => {
                    galleryStartX = e.touches[0].clientX;
                    stopGalleryAutoPlay();
                });

                galleryTrack.addEventListener('touchend', (e) => {
                    galleryEndX = e.changedTouches[0].clientX;
                    const diff = galleryStartX - galleryEndX;
                    
                    if (Math.abs(diff) > 50) {
                        if (diff > 0) {
                            nextGallerySlide();
                        } else {
                            prevGallerySlide();
                        }
                    }
                    startGalleryAutoPlay();
                });
            }

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevGallerySlide();
                    stopGalleryAutoPlay();
                    startGalleryAutoPlay();
                } else if (e.key === 'ArrowRight') {
                    nextGallerySlide();
                    stopGalleryAutoPlay();
                    startGalleryAutoPlay();
                }
            });

            // Initialize gallery
            if (galleryTrack && gallerySlides.length > 0) {
                setupInfiniteGallery();
                createGalleryIndicators();
                startGalleryAutoPlay();
            }
        });

        // Lightbox functionality for the new gallery
        function openLightbox(imageSrc, title, description) {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxTitle = document.getElementById('lightbox-title');
            const lightboxDescription = document.getElementById('lightbox-description');
            
            lightboxImage.src = imageSrc;
            lightboxImage.alt = title;
            lightboxTitle.textContent = title;
            lightboxDescription.textContent = description;
            
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close lightbox when clicking outside the image
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        // Close lightbox with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
 