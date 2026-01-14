@extends('frontend.layouts.app')

@section('title', 'Accent Networks Ltd - Leading ICT Solutions Provider in Zambia')
@section('description', 'Accent Networks Ltd provides comprehensive ICT solutions including telecommunications, data
    networks, CCTV systems, and consultancy services across Zambia.')

@section('content')

    {{-- Hero Section --}}
    <section
        class="relative h-screen flex items-center justify-center bg-gradient-to-br from-accent-blue to-accent-blue-light overflow-hidden">

        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        {{-- Hero Content --}}
        <div class="container mx-auto px-4 z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                    Voice | Data | Networks
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Leading ICT Solutions Provider in Zambia Since 2005
                </p>
                <p class="text-lg mb-10 text-white/80 max-w-2xl mx-auto">
                    Comprehensive telecommunications, data networks, CCTV systems, and consultancy services for businesses
                    across Zambia
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services.index') }}"
                        class="bg-white text-accent-blue px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition transform hover:scale-105">
                        Explore Our Services
                    </a>
                    <a href="{{ route('contact.index') }}"
                        class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-accent-blue transition transform hover:scale-105">
                        Get a Quote
                    </a>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-accent-gray-dark mb-4">Our Services</h2>
                <p class="text-lg text-accent-gray-medium max-w-2xl mx-auto">
                    Comprehensive ICT solutions tailored to meet your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div
                        class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all transform hover:-translate-y-2">
                        {{-- Service Icon Placeholder --}}
                        <div class="w-16 h-16 bg-accent-blue/10 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-accent-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                </path>
                            </svg>
                        </div>

                        <h3 class="text-2xl font-bold text-accent-gray-dark mb-4">{{ $service->name }}</h3>
                        <p class="text-accent-gray-medium mb-6">
                            {{ $service->short_description ?? Str::limit($service->description, 120) }}
                        </p>
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="inline-flex items-center text-accent-blue font-semibold hover:text-accent-blue-light transition">
                            Learn More
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">No services available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}"
                    class="inline-block bg-accent-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-accent-blue-light transition">
                    View All Services
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Projects Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-accent-gray-dark mb-4">Featured Projects</h2>
                <p class="text-lg text-accent-gray-medium max-w-2xl mx-auto">
                    Showcasing our expertise through successful implementations
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                        {{-- Project Image Placeholder --}}
                        <div class="aspect-video bg-gradient-to-br from-accent-blue to-accent-blue-light">
                            <div
                                class="w-full h-full flex items-center justify-center text-white text-6xl font-bold opacity-20">
                                {{ strtoupper(substr($project->title, 0, 1)) }}
                            </div>
                        </div>

                        {{-- Project Info Overlay --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-6 text-white">
                            <span class="text-sm font-semibold mb-2 text-accent-blue-light">
                                {{ $project->category->name ?? 'Uncategorized' }}
                            </span>
                            <h3 class="text-xl font-bold mb-2">{{ $project->title }}</h3>
                            <p class="text-sm text-white/90 mb-4">{{ Str::limit($project->description, 100) }}</p>
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
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">No featured projects available.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}"
                    class="inline-block bg-accent-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-accent-blue-light transition">
                    View All Projects
                </a>
            </div>
        </div>
    </section>

    {{-- Client Logos Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-accent-gray-dark mb-4">Trusted By Leading Organizations</h2>
                <p class="text-lg text-accent-gray-medium">
                    Proud to serve some of Zambia's most respected institutions
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
                @forelse($clients as $client)
                    <div
                        class="flex items-center justify-center p-4 bg-white rounded-lg shadow hover:shadow-lg transition grayscale hover:grayscale-0">
                        {{-- Client Logo Placeholder --}}
                        <div class="w-full h-20 flex items-center justify-center text-accent-gray-medium font-bold text-sm">
                            {{ $client->name }}
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">Client logos will appear here.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-accent-blue text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Transform Your Business?</h2>
            <p class="text-xl mb-10 text-white/90 max-w-2xl mx-auto">
                Let's discuss how our ICT solutions can help you achieve your business goals
            </p>
            <a href="{{ route('contact.index') }}"
                class="inline-block bg-white text-accent-blue px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105">
                Get Started Today
            </a>
        </div>
    </section>

@endsection
