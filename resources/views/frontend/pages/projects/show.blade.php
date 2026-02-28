@extends('frontend.layouts.app')

@section('title', $project->title . ' - Accent Networks')
@section('description', Str::limit(strip_tags($project->description), 160))

@section('content')

    {{-- Hero Section --}}
    <section class="relative overflow-hidden" style="min-height: 380px;">
        @if ($project->featured_image)
            @php
                $imagePath = str_contains($project->featured_image, 'project-images/')
                    ? asset('storage/' . $project->featured_image)
                    : asset('storage/project-images/' . $project->featured_image);
            @endphp
            <div class="absolute inset-0">
                <img src="{{ $imagePath }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background: rgba(0, 62, 126, 0.88);"></div>
            </div>
        @else
            <div class="absolute inset-0" style="background-color: #003E7E;"></div>
        @endif

        <div class="container mx-auto px-4 relative z-10 flex items-center" style="min-height: 380px;">
            <div class="max-w-4xl mx-auto text-center text-white py-16">
                {{-- Breadcrumb --}}
                <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                    <span>/</span>
                    <a href="{{ route('projects.index') }}" class="hover:text-white transition">Projects</a>
                    @if ($project->category)
                        <span>/</span>
                        <a href="{{ route('projects.index', ['category' => $project->category->slug]) }}"
                            class="hover:text-white transition">{{ $project->category->name }}</a>
                    @endif
                    <span>/</span>
                    <span class="text-white">{{ $project->title }}</span>
                </nav>

                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">{{ $project->title }}</h1>
                <div class="w-20 h-1 mx-auto mb-6" style="background-color: #5FA9DD;"></div>

                {{-- Meta badges --}}
                <div class="flex flex-wrap justify-center gap-3">
                    @if ($project->category)
                        <span class="bg-white/20 px-4 py-1.5 rounded-full text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            {{ $project->category->name }}
                        </span>
                    @endif
                    @if ($project->year)
                        <span class="bg-white/20 px-4 py-1.5 rounded-full text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $project->year }}
                        </span>
                    @endif
                    @if ($project->client_name)
                        <span class="bg-white/20 px-4 py-1.5 rounded-full text-sm flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            {{ $project->client_name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content + Sidebar --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-12">

                {{-- Main Content --}}
                <div class="flex-1 min-w-0">

                    {{-- Description --}}
                    <div class="project-content mb-12">
                        <h2 class="text-2xl font-bold mb-6 pb-3"
                            style="color: #003E7E; border-bottom: 2px solid rgba(95,169,221,0.25);">
                            Project Overview
                        </h2>
                        <div>{!! $project->description !!}</div>
                    </div>

                    {{-- Scope --}}
                    @if ($project->scope)
                        <div class="project-content mb-12">
                            <h2 class="text-2xl font-bold mb-6 pb-3"
                                style="color: #003E7E; border-bottom: 2px solid rgba(95,169,221,0.25);">
                                Project Scope
                            </h2>
                            <div>{!! $project->scope !!}</div>
                        </div>
                    @endif

                    {{-- Technologies --}}
                    @if ($project->technologies)
                        <div class="project-content mb-12">
                            <h2 class="text-2xl font-bold mb-6 pb-3"
                                style="color: #003E7E; border-bottom: 2px solid rgba(95,169,221,0.25);">
                                Technologies Used
                            </h2>
                            <div>{!! $project->technologies !!}</div>
                        </div>
                    @endif

                    {{-- Before/After --}}
                    @if ($project->before_image || $project->after_image)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold mb-6 pb-3"
                                style="color: #003E7E; border-bottom: 2px solid rgba(95,169,221,0.25);">
                                Before & After
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if ($project->before_image)
                                    @php
                                        $beforePath = str_contains($project->before_image, 'project-images/')
                                            ? asset('storage/' . $project->before_image)
                                            : asset('storage/project-images/' . $project->before_image);
                                    @endphp
                                    <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                                        <img src="{{ $beforePath }}" alt="Before - {{ $project->title }}"
                                            class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0"
                                            style="background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%);">
                                        </div>
                                        <div class="absolute bottom-0 left-0 right-0 p-5">
                                            <span
                                                class="inline-flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-lg font-semibold text-sm shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Before
                                            </span>
                                        </div>
                                    </div>
                                @endif
                                @if ($project->after_image)
                                    @php
                                        $afterPath = str_contains($project->after_image, 'project-images/')
                                            ? asset('storage/' . $project->after_image)
                                            : asset('storage/project-images/' . $project->after_image);
                                    @endphp
                                    <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                                        <img src="{{ $afterPath }}" alt="After - {{ $project->title }}"
                                            class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                                        <div class="absolute inset-0"
                                            style="background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%);">
                                        </div>
                                        <div class="absolute bottom-0 left-0 right-0 p-5">
                                            <span
                                                class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg font-semibold text-sm shadow-lg">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                After
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                </div>

                {{-- Sidebar --}}
                <aside class="lg:w-80 flex-shrink-0 space-y-6">

                    {{-- Project Details Card --}}
                    <div class="rounded-xl overflow-hidden shadow-lg" style="border: 1px solid #e5e7eb;">
                        <div class="px-6 py-4 text-white font-bold text-lg" style="background-color: #003E7E;">
                            Project Details
                        </div>
                        <div class="bg-white p-6 space-y-4">
                            @if ($project->client_name)
                                <div>
                                    <span class="text-xs font-semibold uppercase tracking-wider"
                                        style="color: #5FA9DD;">Client</span>
                                    <p class="font-semibold mt-1" style="color: #3F3F3F;">{{ $project->client_name }}</p>
                                </div>
                            @endif
                            @if ($project->year)
                                <div>
                                    <span class="text-xs font-semibold uppercase tracking-wider"
                                        style="color: #5FA9DD;">Year</span>
                                    <p class="font-semibold mt-1" style="color: #3F3F3F;">{{ $project->year }}</p>
                                </div>
                            @endif
                            @if ($project->category)
                                <div>
                                    <span class="text-xs font-semibold uppercase tracking-wider"
                                        style="color: #5FA9DD;">Category</span>
                                    <p class="font-semibold mt-1" style="color: #3F3F3F;">{{ $project->category->name }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Other Projects --}}
                    <div class="rounded-xl overflow-hidden shadow-lg" style="border: 1px solid #e5e7eb;">
                        <div class="px-6 py-4 text-white font-bold text-lg" style="background-color: #003E7E;">
                            More Projects
                        </div>
                        <div class="bg-white divide-y divide-gray-100">
                            @foreach (\App\Models\Project::where('is_published', true)->where('id', '!=', $project->id)->orderBy('order')->take(6)->get() as $otherProject)
                                <a href="{{ route('projects.show', $otherProject->slug) }}"
                                    class="flex items-center justify-between px-6 py-3 hover:bg-blue-50 transition group">
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-blue-800 transition">
                                        {{ $otherProject->title }}
                                    </span>
                                    <svg class="w-4 h-4 text-gray-400 flex-shrink-0 group-hover:translate-x-1 transition"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endforeach
                            <a href="{{ route('projects.index') }}"
                                class="flex items-center justify-center px-6 py-3 text-sm font-semibold hover:bg-blue-50 transition"
                                style="color: #003E7E;">
                                View All Projects →
                            </a>
                        </div>
                    </div>

                    {{-- Quick Enquiry --}}
                    <div class="rounded-xl overflow-hidden shadow-lg" style="border: 1px solid #e5e7eb;">
                        <div class="px-6 py-4 text-white font-bold text-lg" style="background-color: #5FA9DD;">
                            Quick Enquiry
                        </div>
                        <div class="bg-white p-6">
                            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="subject" value="Enquiry: {{ $project->title }}">
                                <div>
                                    <input type="text" name="name" placeholder="Your Name" required
                                        class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200 focus:outline-none focus:ring-2 focus:border-transparent">
                                </div>
                                <div>
                                    <input type="email" name="email" placeholder="Email Address" required
                                        class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200 focus:outline-none focus:ring-2 focus:border-transparent">
                                </div>
                                <div>
                                    <input type="tel" name="phone" placeholder="Phone Number"
                                        class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200 focus:outline-none focus:ring-2 focus:border-transparent">
                                </div>
                                <div>
                                    <textarea name="message" rows="4" placeholder="Your Message" required
                                        class="w-full px-4 py-2.5 rounded-lg text-sm border border-gray-200 focus:outline-none focus:ring-2 focus:border-transparent resize-none"></textarea>
                                </div>
                                <button type="submit"
                                    class="w-full py-3 rounded-lg text-white font-semibold text-sm hover:opacity-90 transition"
                                    style="background-color: #003E7E;">
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20" style="background-color: #003E7E;">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Need a Similar Solution?</h2>
                <p class="text-white/80 text-lg mb-10">
                    Let's discuss how we can help your business achieve similar results.
                </p>
                <a href="{{ route('contact.index') }}"
                    class="inline-block px-10 py-4 rounded-lg font-bold text-base hover:bg-gray-100 transition shadow-xl"
                    style="background-color: white; color: #003E7E;">
                    Contact Us Today
                </a>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .project-content h2 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #003E7E;
            margin-top: 2rem;
            margin-bottom: 0.75rem;
            padding-bottom: 0.4rem;
            border-bottom: 2px solid rgba(95, 169, 221, 0.25);
            line-height: 1.3;
        }

        .project-content h2:first-child {
            margin-top: 0;
        }

        .project-content h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: #003E7E;
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .project-content p {
            color: #6E7173;
            line-height: 1.85;
            margin-bottom: 1rem;
            font-size: 0.975rem;
        }

        .project-content ul {
            list-style: none;
            padding: 0;
            margin-bottom: 1.25rem;
        }

        .project-content ul li {
            position: relative;
            padding-left: 1.6rem;
            margin-bottom: 0.6rem;
            color: #6E7173;
            line-height: 1.75;
            font-size: 0.975rem;
        }

        .project-content ul li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.55rem;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #5FA9DD;
        }

        .project-content ol {
            padding-left: 1.5rem;
            margin-bottom: 1.25rem;
            color: #6E7173;
        }

        .project-content ol li {
            margin-bottom: 0.6rem;
            line-height: 1.75;
            font-size: 0.975rem;
        }

        .project-content strong {
            color: #3F3F3F;
            font-weight: 600;
        }

        .project-content a {
            color: #5FA9DD;
            text-decoration: underline;
        }

        .project-content blockquote {
            border-left: 4px solid #5FA9DD;
            padding: 0.75rem 1rem;
            margin: 1.5rem 0;
            color: #6E7173;
            font-style: italic;
            background-color: #f9fafb;
            border-radius: 0 0.5rem 0.5rem 0;
        }

        .project-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .project-content table th {
            background-color: #003E7E;
            color: white;
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .project-content table td {
            padding: 0.65rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            color: #6E7173;
        }

        .project-content table tr:last-child td {
            border-bottom: none;
        }

        .project-content table tr:nth-child(even) td {
            background-color: #f9fafb;
        }
    </style>
@endpush
