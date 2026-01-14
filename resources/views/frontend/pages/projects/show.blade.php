@extends('frontend.layouts.app')

@section('title', $project->title . ' - Accent Networks')
@section('description', Str::limit($project->description, 160))

@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                {{-- Breadcrumb --}}
                <div class="mb-6">
                    <a href="{{ route('projects.index') }}" class="text-white/80 hover:text-white transition">Projects</a>
                    <span class="text-white/60 mx-2">/</span>
                    <span class="text-white">{{ $project->title }}</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $project->title }}</h1>

                <div class="flex flex-wrap gap-4 text-sm">
                    @if ($project->category)
                        <span class="bg-white/20 px-4 py-2 rounded-full">
                            {{ $project->category->name }}
                        </span>
                    @endif
                    @if ($project->year)
                        <span class="bg-white/20 px-4 py-2 rounded-full">
                            {{ $project->year }}
                        </span>
                    @endif
                    @if ($project->client_name)
                        <span class="bg-white/20 px-4 py-2 rounded-full">
                            Client: {{ $project->client_name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Project Details --}}
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                {{-- Description --}}
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-accent-gray-dark mb-4">Project Overview</h2>
                    <p class="text-lg text-accent-gray-medium leading-relaxed">
                        {{ $project->description }}
                    </p>
                </div>

                {{-- Scope (if available) --}}
                @if ($project->scope)
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-accent-gray-dark mb-4">Project Scope</h2>
                        <p class="text-accent-gray-medium leading-relaxed">
                            {{ $project->scope }}
                        </p>
                    </div>
                @endif

                {{-- Technologies (if available) --}}
                @if ($project->technologies)
                    <div class="mb-12">
                        <h2 class="text-2xl font-bold text-accent-gray-dark mb-4">Technologies Used</h2>
                        <p class="text-accent-gray-medium leading-relaxed">
                            {{ $project->technologies }}
                        </p>
                    </div>
                @endif

                {{-- CTA --}}
                <div class="bg-accent-blue text-white rounded-xl p-8 text-center">
                    <h3 class="text-2xl font-bold mb-4">
                        Need a Similar Solution?
                    </h3>
                    <p class="mb-6 text-white/90">
                        Let's discuss how we can help your business achieve similar results
                    </p>
                    <a href="{{ route('contact.index') }}"
                        class="inline-block bg-white text-accent-blue px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Contact Us
                    </a>
                </div>

            </div>
        </div>
    </section>

@endsection
