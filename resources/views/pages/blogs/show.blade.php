@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-green-600 to-teal-700 py-16 md:py-24">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-1 bg-white/20 rounded-full text-white text-sm font-medium mb-4">
                    {{ __('messages.blog') }}
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    {{ $blog->title }}
                </h1>
                <div class="flex items-center justify-center gap-6 text-white/90">
                    @if($blog->author)
                    <span class="flex items-center gap-2">
                        <i class="fas fa-user"></i>
                        {{ $blog->author }}
                    </span>
                    @endif
                    @if($blog->published_date)
                    <span class="flex items-center gap-2">
                        <i class="fas fa-calendar"></i>
                        {{ $blog->published_date->format('M d, Y') }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Featured Image -->
                    @if($blog->featuredMedia)
                    <div class="mb-8 rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ $blog->featuredMedia->url }}" 
                             alt="{{ $blog->title }}" 
                             class="w-full h-auto object-cover">
                    </div>
                    @endif

                    <!-- Content -->
                    <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
                        <div class="prose prose-lg max-w-none">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Recent Blogs -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">{{ __('messages.recent_blogs') }}</h3>
                        <div class="space-y-4">
                            @forelse($recentBlogs as $recent)
                            <a href="{{ route('blog.show', $recent->slug) }}" 
                               class="flex items-center gap-3 p-3 rounded-lg hover:bg-green-50 transition-colors group">
                                @if($recent->featuredMedia)
                                <img src="{{ $recent->featuredMedia->url }}" 
                                     alt="{{ $recent->title }}" 
                                     class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                                @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg flex-shrink-0 flex items-center justify-center">
                                    <i class="fas fa-blog text-gray-400"></i>
                                </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-gray-900 group-hover:text-green-600 transition-colors truncate">
                                        {{ $recent->title }}
                                    </h4>
                                    @if($recent->published_date)
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $recent->published_date->format('M d, Y') }}
                                    </p>
                                    @endif
                                </div>
                            </a>
                            @empty
                            <p class="text-gray-500 text-sm">{{ __('messages.no_recent_blogs') }}</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Back to Blogs -->
                    <a href="{{ route('blogs.index') }}" 
                       class="flex items-center justify-center gap-2 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-arrow-left"></i>
                        {{ __('messages.back_to_blogs') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
