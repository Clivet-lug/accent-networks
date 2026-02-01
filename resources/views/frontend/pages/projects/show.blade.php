@extends('frontend.layouts.app')

@section('title', $project->title . ' - Accent Networks')
@section('description', Str::limit($project->description, 160))

@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                {{-- Breadcrumb --}}
                <div class="mb-6">
                    <a href="{{ route('projects.index') }}" class="text-white/80 hover:text-white transition">Projects</a>
                    @if ($project->category)
                        <span class="text-white/60 mx-2">/</span>
                        <a href="{{ route('projects.index', ['category' => $project->category->slug]) }}"
                            class="text-white/80 hover:text-white transition">
                            {{ $project->category->name }}
                        </a>
                    @endif
                    <span class="text-white/60 mx-2">/</span>
                    <span class="text-white">{{ $project->title }}</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $project->title }}</h1>

                {{-- Project Meta --}}
                <div class="flex flex-wrap gap-4 text-sm">
                    @if ($project->category)
                        <span class="bg-white/20 px-4 py-2 rounded-full flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            {{ $project->category->name }}
                        </span>
                    @endif
                    @if ($project->year)
                        <span class="bg-white/20 px-4 py-2 rounded-full flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ $project->year }}
                        </span>
                    @endif
                    @if ($project->client_name)
                        <span class="bg-white/20 px-4 py-2 rounded-full flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                </path>
                            </svg>
                            {{ $project->client_name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Image --}}
    @if ($project->featured_image)
        <section class="py-12 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    @php
                        // Handle both path formats (same logic as blog)
                        $imagePath = str_contains($project->featured_image, 'project-images/')
                            ? asset('storage/' . $project->featured_image)
                            : asset('storage/project-images/' . $project->featured_image);
                    @endphp
                    <img src="{{ $imagePath }}" alt="{{ $project->title }}" class="w-full h-auto rounded-2xl shadow-2xl">
                </div>
            </div>
        </section>
    @endif

    {{-- Project Details --}}
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                    {{-- Main Content (2/3 width) --}}
                    <div class="lg:col-span-2">

                        {{-- Description --}}
                        <div class="mb-12">
                            <h2 class="text-3xl font-bold mb-6" style="color: #003E7E;">Project Overview</h2>
                            <p class="text-lg leading-relaxed" style="color: #6E7173;">
                                {{ $project->description }}
                            </p>
                        </div>

                        {{-- Scope (if available) --}}
                        @if ($project->scope)
                            <div class="mb-12">
                                <h2 class="text-3xl font-bold mb-6" style="color: #003E7E;">Project Scope</h2>
                                <p class="leading-relaxed" style="color: #6E7173;">
                                    {{ $project->scope }}
                                </p>
                            </div>
                        @endif

                        {{-- Before/After Images --}}
                        @if ($project->before_image || $project->after_image)
                            <div class="mb-12">
                                <h2 class="text-3xl font-bold mb-6" style="color: #003E7E;">Before & After</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @if ($project->before_image)
                                        <div>
                                            <h3 class="text-lg font-semibold mb-3" style="color: #3F3F3F;">Before</h3>
                                            @php
                                                $beforePath = str_contains($project->before_image, 'project-images/')
                                                    ? asset('storage/' . $project->before_image)
                                                    : asset('storage/project-images/' . $project->before_image);
                                            @endphp
                                            <img src="{{ $beforePath }}" alt="Before - {{ $project->title }}"
                                                class="w-full h-64 object-cover rounded-lg shadow-lg">
                                        </div>
                                    @endif

                                    @if ($project->after_image)
                                        <div>
                                            <h3 class="text-lg font-semibold mb-3" style="color: #3F3F3F;">After</h3>
                                            @php
                                                $afterPath = str_contains($project->after_image, 'project-images/')
                                                    ? asset('storage/' . $project->after_image)
                                                    : asset('storage/project-images/' . $project->after_image);
                                            @endphp
                                            <img src="{{ $afterPath }}" alt="After - {{ $project->title }}"
                                                class="w-full h-64 object-cover rounded-lg shadow-lg">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                    </div>

                    {{-- Sidebar (1/3 width) --}}
                    <div class="lg:col-span-1">

                        {{-- Technologies Used --}}
                        @if ($project->technologies)
                            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                                <h3 class="text-xl font-bold mb-4" style="color: #003E7E;">Technologies Used</h3>
                                <p class="leading-relaxed" style="color: #6E7173;">
                                    {{ $project->technologies }}
                                </p>
                            </div>
                        @endif

                        {{-- Project Quick Facts --}}
                        <div class="rounded-xl p-6 mb-6 text-white" style="background-color: #003E7E;">
                            <h3 class="text-xl font-bold mb-4">Project Details</h3>
                            <div class="space-y-3">
                                @if ($project->client_name)
                                    <div>
                                        <span class="text-sm opacity-80">Client</span>
                                        <p class="font-semibold">{{ $project->client_name }}</p>
                                    </div>
                                @endif
                                @if ($project->year)
                                    <div>
                                        <span class="text-sm opacity-80">Year</span>
                                        <p class="font-semibold">{{ $project->year }}</p>
                                    </div>
                                @endif
                                @if ($project->category)
                                    <div>
                                        <span class="text-sm opacity-80">Category</span>
                                        <p class="font-semibold">{{ $project->category->name }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- CTA Box --}}
                        <div class="rounded-xl p-6 text-white" style="background-color: #5FA9DD;">
                            <h3 class="text-xl font-bold mb-3">Need a Similar Solution?</h3>
                            <p class="mb-4 text-sm text-white/90">
                                Let's discuss how we can help your business achieve similar results
                            </p>
                            <a href="{{ route('contact.index') }}"
                                class="block w-full text-center bg-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition"
                                style="color: #003E7E;">
                                Contact Us
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Projects --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">More Projects</h2>
                <div class="text-center">
                    <a href="{{ route('projects.index') }}"
                        class="inline-block px-10 py-4 rounded-lg font-semibold text-white hover:opacity-90 transition shadow-lg"
                        style="background-color: #003E7E;">
                        View All Projects
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
