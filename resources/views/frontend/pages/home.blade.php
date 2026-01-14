@extends('frontend.layouts.app')

@section('title', 'Accent Networks Ltd - Leading ICT Solutions Provider in Zambia')
@section('description',
    'Accent Networks Ltd provides comprehensive ICT solutions including telecommunications, data
    networks, CCTV systems, and consultancy services across Zambia.')

@section('content')

    {{-- Hero Slideshow Section --}}
    <section class="relative h-screen overflow-hidden">

        {{-- Slideshow Container --}}
        <div x-data="{
            currentSlide: 0,
            slides: [{
                    image: '{{ asset('images/hero/slide1.jpg') }}',
                    title: 'Voice | Data | Networks',
                    subtitle: 'Leading ICT Solutions Provider in Zambia Since 2005'
                },
                {
                    image: '{{ asset('images/hero/slide2.jpg') }}',
                    title: 'Enterprise Network Solutions',
                    subtitle: 'Comprehensive LAN & WAN Infrastructure'
                },
                {
                    image: '{{ asset('images/hero/slide3.jpg') }}',
                    title: 'Modern Communication Systems',
                    subtitle: '3CX Phone Systems & CCTV Solutions'
                }
            ]
        }" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 9000)" class="relative h-full">

            {{-- Slides --}}
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="currentSlide === index" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="absolute inset-0">
                    {{-- Background Image with Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-br from-[#003E7E]/90 to-[#5FA9DD]/80">
                        <img :src="slide.image" class="w-full h-full object-cover mix-blend-overlay" alt="Hero slide">
                    </div>

                    {{-- Content --}}
                    <div class="relative h-full flex items-center justify-center">
                        <div class="container mx-auto px-4 text-center text-white">
                            <h1 x-text="slide.title" class="text-5xl md:text-7xl font-bold mb-6 leading-tight"></h1>
                            <p x-text="slide.subtitle" class="text-xl md:text-3xl mb-8"></p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('services.index') }}"
                                    class="bg-white px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition transform hover:scale-105 shadow-lg"
                                    style="color: #003E7E;">
                                    Explore Our Services
                                </a>
                                <a href="{{ route('contact.index') }}"
                                    class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white transition transform hover:scale-105 shadow-lg hover:text-[#003E7E]">
                                    Get a Quote
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            {{-- Slide Indicators --}}
            <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 flex gap-3 z-20">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="currentSlide = index"
                        :class="currentSlide === index ? 'bg-white w-8' : 'bg-white/50 w-3'"
                        class="h-3 rounded-full transition-all duration-300"></button>
                </template>
            </div>

            {{-- Navigation Arrows --}}
            <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white p-4 rounded-full transition z-20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <button @click="currentSlide = (currentSlide + 1) % slides.length"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white p-4 rounded-full transition z-20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            {{-- Scroll Indicator --}}
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce z-20">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                    </path>
                </svg>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Comprehensive ICT solutions tailored to meet your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($services as $index => $service)
                    <div
                        class="group relative bg-white rounded-2xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-3 overflow-hidden">

                        {{-- Gradient Background on Hover --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-blue-500 to-purple-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        {{-- Content --}}
                        <div class="relative z-10">
                            {{-- Colorful Icon --}}
                            <div
                                class="w-16 h-16 mb-6 rounded-xl bg-gradient-to-br {{ $index % 3 == 0 ? 'from-blue-400 to-blue-600' : ($index % 3 == 1 ? 'from-purple-400 to-purple-600' : 'from-pink-400 to-pink-600') }} flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                    </path>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-white transition-colors">
                                {{ $service->name }}
                            </h3>
                            <p class="text-gray-600 mb-6 group-hover:text-white/90 transition-colors">
                                {{ $service->short_description ?? Str::limit($service->description, 120) }}
                            </p>
                            <a href="{{ route('services.show', $service->slug) }}"
                                class="inline-flex items-center text-blue-600 font-semibold group-hover:text-white transition-colors">
                                Learn More
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
                        <p class="text-gray-500">No services available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}"
                    class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-full font-semibold hover:from-blue-700 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
                    View All Services
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Projects Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Projects</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-4"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Showcasing our expertise through successful implementations
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($projects as $index => $project)
                    <div
                        class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">

                        {{-- Colorful Gradient Background --}}
                        <div
                            class="aspect-video bg-gradient-to-br {{ $index % 3 == 0 ? 'from-blue-500 via-purple-500 to-pink-500' : ($index % 3 == 1 ? 'from-green-400 via-blue-500 to-purple-600' : 'from-yellow-400 via-red-500 to-pink-500') }} relative overflow-hidden">

                            {{-- Animated Circles --}}
                            <div class="absolute top-10 left-10 w-32 h-32 bg-white/20 rounded-full blur-2xl animate-pulse">
                            </div>
                            <div
                                class="absolute bottom-10 right-10 w-40 h-40 bg-white/20 rounded-full blur-3xl animate-pulse animation-delay-2000">
                            </div>

                            {{-- Letter Overlay --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center text-white text-8xl font-bold opacity-10">
                                {{ strtoupper(substr($project->title, 0, 1)) }}
                            </div>
                        </div>

                        {{-- Project Info --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-transparent flex flex-col justify-end p-6 text-white">

                            {{-- Category Badge --}}
                            <span
                                class="inline-block self-start px-4 py-1 mb-3 text-xs font-semibold bg-white/20 backdrop-blur-sm rounded-full border border-white/30">
                                {{ $project->category->name ?? 'Uncategorized' }}
                            </span>

                            <h3 class="text-2xl font-bold mb-2">{{ $project->title }}</h3>
                            <p class="text-sm text-white/90 mb-4 line-clamp-2">
                                {{ Str::limit($project->description, 100) }}
                            </p>

                            <a href="{{ route('projects.show', $project->slug) }}"
                                class="inline-flex items-center text-white font-semibold group-hover:text-blue-300 transition">
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
                    class="inline-block bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-full font-semibold hover:from-blue-700 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
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
                        <div
                            class="w-full h-20 flex items-center justify-center text-accent-gray-medium font-bold text-sm">
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
