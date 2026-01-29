@extends('frontend.layouts.app')

@section('title', 'News & Updates - Accent Networks')

@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">News & Updates</h1>
                <p class="text-xl text-white/90">Stay informed about the latest in ICT solutions and industry news</p>
            </div>
        </div>
    </section>

    {{-- Search & Filter Section --}}
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-4 justify-between items-center">

                {{-- Search Bar --}}
                <form action="{{ route('blog.index') }}" method="GET" class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search articles..."
                            value="{{ request('search') }}"
                            class="w-full px-4 py-3 pr-12 border rounded-lg focus:ring-2 focus:ring-accent-blue">
                        <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2">
                            <svg class="w-5 h-5 text-accent-gray-medium" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </form>

                {{-- Category Filter --}}
                <div class="flex gap-2 flex-wrap">
                    <a href="{{ route('blog.index') }}"
                        class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-accent-blue text-white' : 'bg-white text-accent-gray-dark hover:bg-gray-100' }} transition">
                        All
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('blog.index', ['category' => $cat]) }}"
                            class="px-4 py-2 rounded-lg {{ request('category') == $cat ? 'bg-accent-blue text-white' : 'bg-white text-accent-gray-dark hover:bg-gray-100' }} transition">
                            {{ $cat }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Blog Posts Grid --}}
    <section class="py-20">
        <div class="container mx-auto px-4">

            @if ($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($posts as $post)
                        <article
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">

                            {{-- Featured Image --}}
                            <div class="aspect-video relative overflow-hidden">
                                @if ($post->featured_image)
                                    @php
                                        // Handle both formats:
                                        // Format 1: "blog-images/filename.webp" (new - Filament saves full path)
                                        // Format 2: "filename.webp" (old - just filename)
                                        $imagePath = str_contains($post->featured_image, 'blog-images/')
                                            ? asset('storage/' . $post->featured_image)
                                            : asset('storage/blog-images/' . $post->featured_image);
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-white text-6xl font-bold opacity-20"
                                        style="background-color: #003E7E;">
                                        {{ strtoupper(substr($post->title, 0, 1)) }}
                                    </div>
                                @endif

                                {{-- Category Badge --}}
                                @if ($post->category)
                                    <div class="absolute top-4 left-4">
                                        <span
                                            class="bg-white/90 text-accent-blue px-3 py-1 rounded-full text-xs font-semibold">
                                            {{ $post->category }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Post Content --}}
                            <div class="p-6">
                                {{-- Meta Info --}}
                                <div class="flex items-center gap-4 text-sm text-accent-gray-medium mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $post->published_at->format('M d, Y') }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $post->reading_time }}
                                    </span>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-xl font-bold text-accent-gray-dark mb-3 line-clamp-2">
                                    {{ $post->title }}
                                </h3>

                                {{-- Excerpt --}}
                                <p class="text-accent-gray-medium mb-4 line-clamp-3">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                </p>

                                {{-- Read More Link --}}
                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center text-accent-blue font-semibold hover:text-accent-blue-light transition">
                                    Read More
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No posts found</h3>
                    <p class="text-gray-500">Try adjusting your search or filter criteria</p>
                </div>
            @endif

        </div>
    </section>

@endsection
