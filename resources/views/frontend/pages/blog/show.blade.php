@extends('frontend.layouts.app')

@section('title', $blogPost->meta_title ?? $blogPost->title . ' - Accent Networks')
@section('description', $blogPost->meta_description ?? Str::limit($blogPost->excerpt ?? strip_tags($blogPost->content),
    160))

@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                {{-- Breadcrumb --}}
                <div class="mb-6">
                    <a href="{{ route('blog.index') }}" class="text-white/80 hover:text-white transition">News</a>
                    @if ($blogPost->category)
                        <span class="text-white/60 mx-2">/</span>
                        <a href="{{ route('blog.index', ['category' => $blogPost->category]) }}"
                            class="text-white/80 hover:text-white transition">
                            {{ $blogPost->category }}
                        </a>
                    @endif
                </div>

                {{-- Title --}}
                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $blogPost->title }}</h1>

                {{-- Meta Info --}}
                <div class="flex flex-wrap items-center gap-6 text-white/90">
                    @if ($blogPost->author)
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            {{ $blogPost->author->name }}
                        </div>
                    @endif
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        {{ $blogPost->published_at->format('F d, Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $blogPost->reading_time }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        {{ $blogPost->views }} views
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Article Content --}}
    <article class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                {{-- Featured Image --}}
                @if ($blogPost->featured_image)
                    <div class="aspect-video rounded-xl mb-12 overflow-hidden">
                        @php
                            // Handle both formats:
                            // Format 1: "blog-images/filename.webp" (new - Filament saves full path)
                            // Format 2: "filename.webp" (old - just filename)
                            $imagePath = str_contains($blogPost->featured_image, 'blog-images/')
                                ? asset('storage/' . $blogPost->featured_image)
                                : asset('storage/blog-images/' . $blogPost->featured_image);
                        @endphp
                        <img src="{{ $imagePath }}" alt="{{ $blogPost->title }}" class="w-full h-full object-cover">
                    </div>
                @endif

                {{-- Article Body --}}
                <div class="prose prose-lg max-w-none">
                    {!! nl2br(e($blogPost->content)) !!}
                </div>

                {{-- Tags --}}
                @if ($blogPost->tags)
                    @php
                        // Handle both string and array formats
                        $tagsArray = is_array($blogPost->tags)
                            ? $blogPost->tags
                            : array_filter(
                                array_map('trim', explode(',', str_replace(['"', '[', ']'], '', $blogPost->tags))),
                            );
                    @endphp

                    @if (count($tagsArray) > 0)
                        <div class="mt-12 pt-8 border-t">
                            <h3 class="text-lg font-semibold mb-4">Tags:</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($tagsArray as $tag)
                                    @if (trim($tag))
                                        <span class="bg-gray-100 text-accent-gray-dark px-4 py-2 rounded-full text-sm">
                                            {{ trim($tag) }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif

                {{-- Share Section --}}
                <div class="mt-12 pt-8 border-t">
                    <h3 class="text-lg font-semibold mb-4">Share this article:</h3>
                    <div class="flex gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blogPost->slug)) }}"
                            target="_blank" class="bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blogPost->slug)) }}&text={{ urlencode($blogPost->title) }}"
                            target="_blank" class="bg-blue-400 text-white p-3 rounded-lg hover:bg-blue-500 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $blogPost->slug)) }}"
                            target="_blank" class="bg-blue-700 text-white p-3 rounded-lg hover:bg-blue-800 transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </article>

    {{-- Related Posts --}}
    @if ($relatedPosts->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">Related Articles</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach ($relatedPosts as $relatedPost)
                        <a href="{{ route('blog.show', $relatedPost->slug) }}"
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">

                            {{-- Featured Image --}}
                            <div class="aspect-video relative overflow-hidden">
                                @if ($relatedPost->featured_image)
                                    @php
                                        // Handle both formats
                                        $imagePath = str_contains($relatedPost->featured_image, 'blog-images/')
                                            ? asset('storage/' . $relatedPost->featured_image)
                                            : asset('storage/blog-images/' . $relatedPost->featured_image);
                                    @endphp
                                    <img src="{{ $imagePath }}" alt="{{ $relatedPost->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-white text-4xl font-bold opacity-20"
                                        style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
                                        {{ strtoupper(substr($relatedPost->title, 0, 1)) }}
                                    </div>
                                @endif
                            </div>

                            {{-- Post Content --}}
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 line-clamp-2" style="color: #3F3F3F;">
                                    {{ $relatedPost->title }}
                                </h3>
                                <p class="text-sm flex items-center" style="color: #6E7173;">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ $relatedPost->published_at->format('M d, Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
