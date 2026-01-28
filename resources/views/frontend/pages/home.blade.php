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
        }" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 5000)" class="relative h-full">

            {{-- Slides --}}
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="currentSlide === index" x-transition:enter="transition ease-out duration-1000"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="absolute inset-0">
                    {{-- Background Image with Overlay (SOLID COLOR) --}}
                    <div class="absolute inset-0" style="background-color: #003E7E; opacity: 0.9;">
                        <img :src="slide.image" class="w-full h-full object-cover mix-blend-overlay opacity-50"
                            alt="Hero slide">
                    </div>

                    {{-- Content --}}
                    <div class="relative h-full flex items-center justify-center">
                        <div class="container mx-auto px-4 text-center text-white">
                            <h1 x-text="slide.title" class="text-5xl md:text-7xl font-bold mb-6 leading-tight"></h1>
                            <p x-text="slide.subtitle" class="text-xl md:text-3xl mb-8"></p>

                            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                <a href="{{ route('services.index') }}"
                                    class="bg-white px-8 py-4 rounded-lg font-semibold hover:opacity-90 transition shadow-lg"
                                    style="color: #003E7E;">
                                    Explore Our Services
                                </a>
                                <a href="{{ route('contact.index') }}"
                                    class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white transition shadow-lg"
                                    style="hover:color: #003E7E;">
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
                    <button @click="currentSlide = index" class="h-3 rounded-full transition-all duration-300"
                        :class="currentSlide === index ? 'bg-white w-8' : 'w-3'"
                        :style="currentSlide === index ? '' : 'background-color: rgba(255,255,255,0.5);'"></button>
                </template>
            </div>

            {{-- Navigation Arrows --}}
            <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length"
                class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white p-4 rounded-full transition z-20"
                style="background-color: rgba(255,255,255,0.2);">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <button @click="currentSlide = (currentSlide + 1) % slides.length"
                class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white p-4 rounded-full transition z-20"
                style="background-color: rgba(255,255,255,0.2);">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </section>

    {{-- About Us Preview Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">

                {{-- Image --}}
                <div class="relative">
                    <img src="{{ asset('images/about/team.jpg') }}" alt="Accent Networks Team"
                        class="rounded-2xl shadow-2xl w-full h-[500px] object-cover">

                    {{-- Stats Overlay --}}
                    <div
                        class="absolute -bottom-8 -right-8 bg-gradient-to-br from-[#003E7E] to-[#5FA9DD] text-white p-8 rounded-2xl shadow-2xl">
                        <div class="text-center">
                            <p class="text-5xl font-bold mb-2" x-data="{ count: 0 }" x-init="setInterval(() => { if (count < 19) count++ }, 100)">
                                <span x-text="count"></span>+
                            </p>
                            <p class="text-sm">Years Experience</p>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div>
                    <h2 class="text-4xl font-bold mb-6" style="color: #003E7E;">
                        Leading ICT Solutions Provider Since 2005
                    </h2>

                    <div class="w-24 h-1 bg-gradient-to-r from-[#003E7E] to-[#5FA9DD] mb-6"></div>

                    <p class="text-lg text-gray-600 mb-6">
                        Accent Networks Ltd was established in 2005 and incorporated as a limited company in 2008.
                        We provide a comprehensive range of Telecoms and Data services across Zambia.
                    </p>

                    <p class="text-lg text-gray-600 mb-8">
                        Managed by a highly trained, experienced, and innovative professional team, we're committed to
                        delivering excellence in telecommunications and data networks.
                    </p>

                    {{-- Key Points --}}
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <div
                                class="w-6 h-6 rounded-full bg-[#5FA9DD]/20 flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                <svg class="w-4 h-4" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700">Trusted by leading organizations across Zambia</p>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-6 h-6 rounded-full bg-[#5FA9DD]/20 flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                <svg class="w-4 h-4" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700">Comprehensive ICT solutions tailored to your needs</p>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="w-6 h-6 rounded-full bg-[#5FA9DD]/20 flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                <svg class="w-4 h-4" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700">Partners with global technology leaders</p>
                        </div>
                    </div>

                    <a href="{{ route('about') }}"
                        class="inline-block px-8 py-4 rounded-lg font-semibold text-white transition transform hover:scale-105 shadow-lg"
                        style="background: #003E7E;">
                        Learn More About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-20" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Our Services</h2>
                <div class="w-24 h-1 mx-auto mb-4" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Comprehensive ICT solutions tailored to meet your business needs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div
                        class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 h-96">

                        {{-- Full Background Image --}}
                        @if ($service->featured_image)
                            <img src="{{ Storage::url($service->featured_image) }}" alt="{{ $service->name }}"
                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            {{-- Placeholder gradient if no image --}}
                            <div class="absolute inset-0 w-full h-full"
                                style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);"></div>
                        @endif

                        {{-- Dark overlay (always visible) --}}
                        <div class="absolute inset-0 bg-black opacity-40"></div>

                        {{-- Blue overlay on hover --}}
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-90 transition-opacity duration-300"
                            style="background-color: #003E7E;"></div>

                        {{-- Content --}}
                        <div class="absolute inset-0 flex flex-col justify-end p-8 text-white z-10">
                            <h3
                                class="text-2xl font-bold mb-3 transform group-hover:translate-y-[-20px] transition-transform duration-300">
                                {{ $service->name }}
                            </h3>
                            <p
                                class="text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform group-hover:translate-y-[-10px]">
                                {{ $service->short_description ?? Str::limit($service->description, 100) }}
                            </p>
                            <a href="{{ route('services.show', $service->slug) }}"
                                class="inline-flex items-center font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
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
                    class="inline-block px-10 py-4 rounded-lg font-semibold text-white hover:opacity-90 transition shadow-lg"
                    style="background-color: #003E7E;">
                    View All Services
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Projects Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Featured Projects</h2>
                <div class="w-24 h-1 mx-auto mb-4" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Showcasing our expertise through successful implementations
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div
                        class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 h-96">

                        {{-- Project Image/Background --}}
                        <div class="absolute inset-0 w-full h-full" style="background-color: #003E7E;">
                            <div
                                class="absolute inset-0 flex items-center justify-center text-white text-8xl font-bold opacity-10">
                                {{ strtoupper(substr($project->title, 0, 1)) }}
                            </div>
                        </div>

                        {{-- Blue overlay becomes lighter on hover --}}
                        <div class="absolute inset-0 group-hover:opacity-80 transition-opacity duration-300"
                            style="background-color: #003E7E;"></div>

                        {{-- Content --}}
                        <div class="absolute inset-0 flex flex-col justify-end p-8 text-white z-10">

                            {{-- Category Badge --}}
                            @if ($project->category)
                                <span
                                    class="inline-block self-start px-4 py-1 mb-3 text-xs font-semibold rounded-full border border-white/30"
                                    style="background-color: rgba(95, 169, 221, 0.2);">
                                    {{ $project->category->name }}
                                </span>
                            @endif

                            <h3
                                class="text-2xl font-bold mb-2 transform group-hover:translate-y-[-10px] transition-transform duration-300">
                                {{ $project->title }}
                            </h3>

                            <p class="text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                {{ Str::limit($project->description, 100) }}
                            </p>

                            <a href="{{ route('projects.show', $project->slug) }}"
                                class="inline-flex items-center font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
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
                    class="inline-block px-10 py-4 rounded-lg font-semibold text-white hover:opacity-90 transition shadow-lg"
                    style="background-color: #003E7E;">
                    View All Projects
                </a>
            </div>
        </div>
    </section>

    {{-- Client Logos Carousel --}}
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Trusted By Leading Organizations</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#003E7E] to-[#5FA9DD] mx-auto mb-4"></div>
                <p class="text-lg text-gray-600">Proud to serve some of Zambia's most respected institutions</p>
            </div>

            @if ($clients->count() > 0)
                <div x-data="{
                    currentIndex: 0,
                    clients: {{ $clients->count() }},
                    autoplay: null
                }" x-init="autoplay = setInterval(() => {
                    currentIndex = (currentIndex + 1) % Math.ceil(clients / 4);
                }, 3000)" @mouseenter="clearInterval(autoplay)"
                    @mouseleave="autoplay = setInterval(() => { currentIndex = (currentIndex + 1) % Math.ceil(clients / 4); }, 3000)"
                    class="relative overflow-hidden">

                    <div class="flex transition-transform duration-500"
                        :style="`transform: translateX(-${currentIndex * 100}%)`">
                        @foreach ($clients->chunk(4) as $chunk)
                            <div class="flex-shrink-0 w-full grid grid-cols-2 md:grid-cols-4 gap-8 px-4">
                                @foreach ($chunk as $client)
                                    <div
                                        class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:scale-105 grayscale hover:grayscale-0 flex items-center justify-center">
                                        @if ($client->logo)
                                            <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}"
                                                class="max-h-20 w-auto mx-auto">
                                        @else
                                            <p class="text-center font-bold text-gray-700">{{ $client->name }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                    {{-- Navigation Dots --}}
                    <div class="flex justify-center gap-2 mt-8">
                        @for ($i = 0; $i < ceil($clients->count() / 4); $i++)
                            <button @click="currentIndex = {{ $i }}"
                                :class="currentIndex === {{ $i }} ? 'bg-[#003E7E] w-8' : 'bg-gray-300 w-3'"
                                class="h-3 rounded-full transition-all"></button>
                        @endfor
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Testimonials Slider
    <section class="py-20 bg-gradient-to-br from-[#003E7E] to-[#5FA9DD] text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">What Our Clients Say</h2>
                <div class="w-24 h-1 bg-white/30 mx-auto"></div>
            </div>

            @if ($testimonials->count() > 0)
                <div x-data="{ currentTestimonial: 0 }" x-init="setInterval(() => { currentTestimonial = (currentTestimonial + 1) % {{ $testimonials->count() }} }, 5000)" class="max-w-4xl mx-auto">

                    @foreach ($testimonials as $index => $testimonial)
                        <div x-show="currentTestimonial === {{ $index }}"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100" class="text-center">

                            {{-- Quote Icon
                            <svg class="w-16 h-16 mx-auto mb-6 text-white/30" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z" />
                            </svg>

                            {{-- Content
                            <p class="text-xl md:text-2xl mb-8 italic">
                                "{{ $testimonial->content }}"
                            </p>

                            {{-- Rating -
                            <div class="flex justify-center gap-1 mb-6">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-6 h-6 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-white/30' }}"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>

                            {{-- Author --
                            <p class="font-bold text-lg">{{ $testimonial->client_name }}</p>
                            <p class="text-white/80">{{ $testimonial->position }} at {{ $testimonial->company }}</p>
                        </div>
                    @endforeach

                    {{-- Dots --
                    <div class="flex justify-center gap-2 mt-12">
                        @foreach ($testimonials as $index => $testimonial)
                            <button @click="currentTestimonial = {{ $index }}"
                                :class="currentTestimonial === {{ $index }} ? 'bg-white w-8' : 'bg-white/30 w-3'"
                                class="h-3 rounded-full transition-all"></button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section> --}}

    {{-- Stats Counter --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

                {{-- Years in Business --}}
                <div class="text-center">
                    <p class="text-5xl md:text-6xl font-bold mb-2" style="color: #003E7E;">
                        19+
                    </p>
                    <p class="text-gray-600 font-semibold">Years in Business</p>
                </div>

                {{-- Projects Completed --}}
                <div class="text-center">
                    <p class="text-5xl md:text-6xl font-bold mb-2" style="color: #5FA9DD;">
                        500+
                    </p>
                    <p class="text-gray-600 font-semibold">Projects Completed</p>
                </div>

                {{-- Clients Served --}}
                <div class="text-center">
                    <p class="text-5xl md:text-6xl font-bold mb-2" style="color: #003E7E;">
                        100+
                    </p>
                    <p class="text-gray-600 font-semibold">Satisfied Clients</p>
                </div>

                {{-- Team Members --}}
                <div class="text-center">
                    <p class="text-5xl md:text-6xl font-bold mb-2" style="color: #5FA9DD;">
                        25+
                    </p>
                    <p class="text-gray-600 font-semibold">Expert Team Members</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Latest News Section --}}
    <section class="py-20" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Latest News & Updates</h2>
                <div class="w-24 h-1 mx-auto mb-4" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Stay informed about the latest in ICT solutions and industry news
                </p>
            </div>

            @php
                $latestPosts = \App\Models\BlogPost::published()->latest()->take(3)->get();
            @endphp

            @if ($latestPosts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($latestPosts as $post)
                        <article
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">

                            {{-- Featured Image --}}
                            <div class="aspect-video relative overflow-hidden">
                                @if ($post->featured_image)
                                    @php
                                        // Handle both old and new image paths
                                        $imagePath = file_exists(public_path('storage/' . $post->featured_image))
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

                                @if ($post->category)
                                    <div class="absolute top-4 left-4 z-10">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold text-white"
                                            style="background-color: #5FA9DD;">
                                            {{ $post->category }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Post Content --}}
                            <div class="p-6">
                                <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        {{ $post->published_at->format('M d, Y') }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">
                                    {{ $post->title }}
                                </h3>

                                <p class="text-gray-600 mb-4">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                                </p>

                                <a href="{{ route('blog.show', $post->slug) }}"
                                    class="inline-flex items-center font-semibold" style="color: #003E7E;">
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

                <div class="text-center mt-12">
                    <a href="{{ route('blog.index') }}"
                        class="inline-block px-10 py-4 rounded-lg font-semibold text-white hover:opacity-90 transition shadow-lg"
                        style="background-color: #003E7E;">
                        View All News
                    </a>
                </div>
            @endif
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
