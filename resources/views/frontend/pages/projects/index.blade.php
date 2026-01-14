@extends('frontend.layouts.app')

@section('title', 'Our Projects - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Our Projects</h1>
            <p class="text-xl">Showcasing our expertise through successful implementations</p>
        </div>
    </section>

    {{-- Filter Section --}}
    <section class="py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('projects.index') }}"
                    class="px-6 py-3 rounded-lg {{ !request('category') ? 'bg-accent-blue text-white' : 'bg-white text-accent-gray-dark hover:bg-gray-100' }} transition font-semibold">
                    All Projects
                </a>
                @foreach ($categories as $cat)
                    <a href="{{ route('projects.index', ['category' => $cat->slug]) }}"
                        class="px-6 py-3 rounded-lg {{ request('category') == $cat->slug ? 'bg-accent-blue text-white' : 'bg-white text-accent-gray-dark hover:bg-gray-100' }} transition font-semibold">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects Grid --}}
    <section class="py-20">
        <div class="container mx-auto px-4">
            @if ($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                            {{-- Project Image with Gradient --}}
                            <div
                                class="aspect-video bg-gradient-to-br from-accent-blue via-purple-500 to-accent-blue-light relative">
                                <div
                                    class="absolute inset-0 flex items-center justify-center text-white text-6xl font-bold opacity-30">
                                    {{ strtoupper(substr($project->title, 0, 1)) }}
                                </div>
                            </div>

                            {{-- Project Info Overlay --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent flex flex-col justify-end p-6 text-white">
                                <span class="text-sm font-semibold mb-2 text-accent-blue-light">
                                    {{ $project->category->name ?? 'Uncategorized' }} • {{ $project->year }}
                                </span>
                                <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                                <p class="text-sm text-white/90 mb-4 line-clamp-2">
                                    {{ Str::limit($project->description, 100) }}</p>
                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="inline-flex items-center text-white font-semibold group-hover:text-accent-blue-light transition">
                                    View Project
                                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No projects found in this category.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
