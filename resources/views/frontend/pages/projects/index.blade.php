@extends('frontend.layouts.app')
@section('title', 'Our Projects - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="py-20" style="background-color: #003E7E;">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold text-white mb-4">Our Projects</h1>
            <div class="w-24 h-1 bg-white mx-auto mb-4"></div>
            <p class="text-xl text-white">Showcasing our expertise through successful implementations</p>
        </div>
    </section>

    {{-- Filter Section --}}
    <section class="py-8" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('projects.index') }}"
                    class="px-6 py-3 rounded-lg font-semibold transition {{ !request('category') ? 'text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}"
                    style="{{ !request('category') ? 'background-color: #003E7E;' : '' }}">
                    All Projects
                </a>
                @foreach ($categories as $cat)
                    <a href="{{ route('projects.index', ['category' => $cat->slug]) }}"
                        class="px-6 py-3 rounded-lg font-semibold transition {{ request('category') == $cat->slug ? 'text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}"
                        style="{{ request('category') == $cat->slug ? 'background-color: #003E7E;' : '' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects Grid --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            @if ($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div
                            class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all h-96">

                            {{-- Background --}}
                            <div class="absolute inset-0 w-full h-full" style="background-color: #003E7E;">
                                <div
                                    class="absolute inset-0 flex items-center justify-center text-white text-8xl font-bold opacity-10">
                                    {{ strtoupper(substr($project->title, 0, 1)) }}
                                </div>
                            </div>

                            {{-- Overlay --}}
                            <div class="absolute inset-0 group-hover:opacity-80 transition-opacity duration-300"
                                style="background-color: #003E7E;"></div>

                            {{-- Content --}}
                            <div class="absolute inset-0 flex flex-col justify-end p-8 text-white z-10">

                                @if ($project->category)
                                    <span
                                        class="inline-block self-start px-4 py-1 mb-3 text-xs font-semibold rounded-full border border-white/30"
                                        style="background-color: rgba(95, 169, 221, 0.3);">
                                        {{ $project->category->name }}
                                    </span>
                                @endif

                                <h3 class="text-2xl font-bold mb-2">{{ $project->title }}</h3>
                                <p class="text-sm mb-4 opacity-0 group-hover:opacity-100 transition">
                                    {{ Str::limit($project->description, 100) }}
                                </p>

                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="inline-flex items-center font-semibold opacity-0 group-hover:opacity-100 transition">
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
                    <p class="text-gray-500 text-lg">No projects found{{ request('category') ? ' in this category' : '' }}.
                    </p>
                </div>
            @endif
        </div>
    </section>

@endsection
