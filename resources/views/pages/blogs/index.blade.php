@extends('layouts.app')

@section('content')
<main id="main-content" class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-green-600 to-teal-700 py-16 md:py-20">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ __('messages.blogs_title') }}</h1>
                <p class="text-lg text-white/90">{{ __('messages.blogs_subtitle') }}</p>
            </div>
        </div>
    </section>

    <!-- Blogs Grid -->
    <section class="py-12 md:py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($blogs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogs as $blog)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    @if($blog->featuredMedia)
                    <a href="{{ route('blog.show', $blog->slug) }}" class="block aspect-video overflow-hidden">
                        <img src="{{ $blog->featuredMedia->url }}" alt="{{ $blog->title }}" 
                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </a>
                    @else
                    <a href="{{ route('blog.show', $blog->slug) }}" class="block aspect-video bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center">
                        <i class="fas fa-blog text-white text-5xl opacity-50"></i>
                    </a>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                            @if($blog->author)
                            <span class="flex items-center gap-1">
                                <i class="fas fa-user text-xs"></i>
                                {{ $blog->author }}
                            </span>
                            @endif
                            @if($blog->published_date)
                            <span class="flex items-center gap-1">
                                <i class="fas fa-calendar text-xs"></i>
                                {{ $blog->published_date->format('M d, Y') }}
                            </span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('blog.show', $blog->slug) }}" class="hover:text-green-600 transition-colors">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $blog->short_description }}
                        </p>
                        <a href="{{ route('blog.show', $blog->slug) }}" 
                           class="inline-flex items-center gap-2 text-green-600 hover:text-green-700 font-semibold transition-colors">
                            {{ __('messages.read_more') }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
            
            @if($blogs->hasPages())
            <div class="mt-12">
                {{ $blogs->links() }}
            </div>
            @endif
            @else
            <div class="text-center py-16">
                <i class="fas fa-blog text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg">{{ __('messages.no_blogs_found') }}</p>
            </div>
            @endif
        </div>
    </section>
</main>
@endsection
