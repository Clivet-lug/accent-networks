@extends('frontend.layouts.app')

@section('title', $service->name . ' - Accent Networks')
@section('description', $service->short_description ?? Str::limit(strip_tags($service->description), 160))

@section('content')

    {{-- Hero Section --}}
    <section class="relative overflow-hidden" style="min-height: 420px;">
        @if ($service->featured_image)
            @php
                $imagePath = str_contains($service->featured_image, 'service-images/')
                    ? asset('storage/' . $service->featured_image)
                    : asset('storage/service-images/' . $service->featured_image);
            @endphp
            <div class="absolute inset-0">
                <img src="{{ $imagePath }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background: rgba(0, 62, 126, 0.88);"></div>
            </div>
        @else
            <div class="absolute inset-0" style="background-color: #003E7E;"></div>
        @endif

        <div class="container mx-auto px-4 relative z-10 flex items-center" style="min-height: 420px;">
            <div class="max-w-4xl mx-auto text-center text-white py-20">
                {{-- Breadcrumb --}}
                <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-6">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                    <span>/</span>
                    <a href="{{ route('services.index') }}" class="hover:text-white transition">Services</a>
                    <span>/</span>
                    <span class="text-white">{{ $service->name }}</span>
                </nav>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">{{ $service->name }}</h1>
                <div class="w-20 h-1 mx-auto mb-6" style="background-color: #5FA9DD;"></div>
                @if ($service->short_description)
                    <p class="text-lg md:text-xl text-white/85 max-w-2xl mx-auto leading-relaxed">
                        {{ $service->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Main Content + Sidebar Layout --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-12">

                {{-- Main Description --}}
                <div class="flex-1 min-w-0">
                    <div class="service-content">
                        {!! $service->description !!}
                    </div>
                </div>

                {{-- Sidebar --}}
                <aside class="lg:w-80 flex-shrink-0">

                    {{-- Other Services --}}
                    <div class="rounded-xl overflow-hidden shadow-lg mb-6" style="border: 1px solid #e5e7eb;">
                        <div class="px-6 py-4 text-white font-bold text-lg" style="background-color: #003E7E;">
                            Our Services
                        </div>
                        <div class="bg-white divide-y divide-gray-100">
                            @foreach (\App\Models\Service::active()->ordered()->get() as $sidebarService)
                                <a href="{{ route('services.show', $sidebarService->slug) }}"
                                    class="flex items-center justify-between px-6 py-3 hover:bg-blue-50 transition group {{ $sidebarService->id === $service->id ? 'bg-blue-50' : '' }}">
                                    <span
                                        class="text-sm font-medium {{ $sidebarService->id === $service->id ? 'font-bold' : 'text-gray-700 group-hover:text-blue-800' }}"
                                        style="{{ $sidebarService->id === $service->id ? 'color: #003E7E;' : '' }}">
                                        {{ $sidebarService->name }}
                                    </span>
                                    <svg class="w-4 h-4 flex-shrink-0 transition group-hover:translate-x-1 {{ $sidebarService->id === $service->id ? '' : 'text-gray-400' }}"
                                        style="{{ $sidebarService->id === $service->id ? 'color: #5FA9DD;' : '' }}"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Quick Enquiry Form --}}
                    <div class="rounded-xl overflow-hidden shadow-lg" style="border: 1px solid #e5e7eb;">
                        <div class="px-6 py-4 text-white font-bold text-lg" style="background-color: #5FA9DD;">
                            Quick Enquiry
                        </div>
                        <div class="bg-white p-6">
                            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="subject" value="Enquiry: {{ $service->name }}">
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

    {{-- Before/After Images --}}
    @if ($service->before_image || $service->after_image)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-bold mb-3" style="color: #003E7E;">See The Difference</h2>
                        <div class="w-16 h-1 mx-auto" style="background-color: #5FA9DD;"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @if ($service->before_image)
                            @php
                                $beforePath = str_contains($service->before_image, 'service-images/')
                                    ? asset('storage/' . $service->before_image)
                                    : asset('storage/service-images/' . $service->before_image);
                            @endphp
                            <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                                <img src="{{ $beforePath }}" alt="Before - {{ $service->name }}"
                                    class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0"
                                    style="background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%);"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-5">
                                    <span
                                        class="inline-flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded-lg font-semibold text-sm shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Before
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if ($service->after_image)
                            @php
                                $afterPath = str_contains($service->after_image, 'service-images/')
                                    ? asset('storage/' . $service->after_image)
                                    : asset('storage/service-images/' . $service->after_image);
                            @endphp
                            <div class="relative group overflow-hidden rounded-2xl shadow-xl">
                                <img src="{{ $afterPath }}" alt="After - {{ $service->name }}"
                                    class="w-full h-80 object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0"
                                    style="background: linear-gradient(to top, rgba(0,0,0,0.5) 0%, transparent 60%);">
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 p-5">
                                    <span
                                        class="inline-flex items-center gap-2 bg-green-500 text-white px-4 py-2 rounded-lg font-semibold text-sm shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            </div>
        </section>
    @endif

    {{-- Image Gallery --}}
    @if ($service->gallery_images && count($service->gallery_images) > 0)
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-bold mb-3" style="color: #003E7E;">Gallery</h2>
                        <div class="w-16 h-1 mx-auto" style="background-color: #5FA9DD;"></div>
                    </div>

                    {{-- Carousel --}}
                    <div class="relative" x-data="galleryCarousel()" x-init="init()">
                        <div class="overflow-hidden rounded-2xl shadow-xl">
                            <div class="flex transition-transform duration-500 ease-in-out"
                                :style="'transform: translateX(-' + (current * 100 / visibleCount) + '%)'">
                                @foreach ($service->gallery_images as $index => $galleryImage)
                                    @php
                                        $galleryPath = str_contains($galleryImage, 'service-images/')
                                            ? asset('storage/' . $galleryImage)
                                            : asset('storage/service-images/gallery/' . $galleryImage);
                                    @endphp
                                    <div class="flex-shrink-0 px-2" :style="'width: ' + (100 / visibleCount) + '%'">
                                        <div class="relative group overflow-hidden rounded-xl" style="height: 160px;">
                                            <img src="{{ $galleryPath }}"
                                                alt="{{ $service->name }} Gallery {{ $index + 1 }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                style="background: rgba(0, 62, 126, 0.3);"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Prev Button --}}
                        <button @click="prev()"
                            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 w-11 h-11 rounded-full shadow-xl flex items-center justify-center transition hover:scale-110 z-10"
                            style="background-color: #003E7E;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        {{-- Next Button --}}
                        <button @click="next()"
                            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 w-11 h-11 rounded-full shadow-xl flex items-center justify-center transition hover:scale-110 z-10"
                            style="background-color: #003E7E;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        {{-- Dots --}}
                        <div class="flex justify-center gap-2 mt-6">
                            @foreach ($service->gallery_images as $index => $galleryImage)
                                <button @click="goTo({{ $index }})"
                                    class="transition-all duration-300 rounded-full"
                                    :class="current === {{ $index }} ? 'w-6 h-2.5' :
                                        'w-2.5 h-2.5 bg-gray-300 hover:bg-gray-400'"
                                    :style="current === {{ $index }} ? 'background-color: #003E7E;' : ''">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Key Features Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-3" style="color: #003E7E;">Why Choose Accent Networks?</h2>
                    <div class="w-16 h-1 mx-auto mb-4" style="background-color: #5FA9DD;"></div>
                    <p class="text-gray-500 max-w-xl mx-auto">We deliver professional ICT solutions backed by experience,
                        reliability, and ongoing support.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $features = [
                            [
                                'icon' => 'M5 13l4 4L19 7',
                                'title' => 'Professional Installation',
                                'desc' =>
                                    'Expert team ensures every system is properly set up, configured, and tested before handover.',
                                'color' => '#003E7E',
                            ],
                            [
                                'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                                'title' => 'Fast Deployment',
                                'desc' =>
                                    'Efficient project management and implementation to minimise downtime for your business.',
                                'color' => '#5FA9DD',
                            ],
                            [
                                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                'title' => '24/7 Support',
                                'desc' =>
                                    'Round-the-clock technical assistance so your systems stay running when you need them most.',
                                'color' => '#003E7E',
                            ],
                            [
                                'icon' =>
                                    'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                                'title' => 'Secure & Reliable',
                                'desc' =>
                                    'Enterprise-grade security standards and reliable infrastructure you can depend on.',
                                'color' => '#5FA9DD',
                            ],
                            [
                                'icon' =>
                                    'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                                'title' => 'Cost-Effective',
                                'desc' =>
                                    'Competitive pricing with flexible options tailored to businesses of all sizes.',
                                'color' => '#003E7E',
                            ],
                            [
                                'icon' =>
                                    'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
                                'title' => 'Scalable Solutions',
                                'desc' => 'Systems designed to grow alongside your organisation as your needs evolve.',
                                'color' => '#5FA9DD',
                            ],
                        ];
                    @endphp

                    @foreach ($features as $feature)
                        <div
                            class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-shadow duration-300 flex gap-5 items-start">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0"
                                style="background-color: {{ $feature['color'] }}20;">
                                <svg class="w-6 h-6" fill="none" stroke="{{ $feature['color'] }}" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $feature['icon'] }}" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-base mb-1" style="color: #003E7E;">{{ $feature['title'] }}</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">{{ $feature['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20" style="background-color: #003E7E;">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Interested in {{ $service->name }}?</h2>
                <p class="text-white/80 text-lg mb-10">
                    Contact us today to learn more about how we can help your business.
                </p>
                <a href="{{ $service->cta_link ?? route('contact.index') }}"
                    class="inline-block px-10 py-4 rounded-lg font-bold text-base hover:bg-gray-100 transition shadow-xl"
                    style="background-color: white; color: #003E7E;">
                    {{ $service->cta_text ?? 'Get a Quote' }}
                </a>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .service-content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #003E7E;
            margin-top: 2.5rem;
            margin-bottom: 0.75rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(95, 169, 221, 0.25);
            line-height: 1.3;
        }

        .service-content h2:first-child {
            margin-top: 0;
        }

        .service-content h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: #003E7E;
            margin-top: 1.75rem;
            margin-bottom: 0.5rem;
        }

        .service-content p {
            color: #6E7173;
            line-height: 1.85;
            margin-bottom: 1rem;
            font-size: 0.975rem;
        }

        .service-content ul {
            list-style: none;
            padding: 0;
            margin-bottom: 1.5rem;
        }

        .service-content ul li {
            position: relative;
            padding-left: 1.6rem;
            margin-bottom: 0.6rem;
            color: #6E7173;
            line-height: 1.75;
            font-size: 0.975rem;
        }

        .service-content ul li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0.55rem;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #5FA9DD;
            flex-shrink: 0;
        }

        .service-content ol {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
            color: #6E7173;
        }

        .service-content ol li {
            margin-bottom: 0.6rem;
            line-height: 1.75;
            font-size: 0.975rem;
        }

        .service-content strong {
            color: #3F3F3F;
            font-weight: 600;
        }

        .service-content a {
            color: #5FA9DD;
            text-decoration: underline;
        }

        .service-content blockquote {
            border-left: 4px solid #5FA9DD;
            padding: 0.75rem 1rem;
            margin: 1.5rem 0;
            color: #6E7173;
            font-style: italic;
            background-color: #f9fafb;
            border-radius: 0 0.5rem 0.5rem 0;
        }

        .service-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .service-content table th {
            background-color: #003E7E;
            color: white;
            padding: 0.75rem 1rem;
            text-align: left;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .service-content table td {
            padding: 0.65rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            color: #6E7173;
        }

        .service-content table tr:last-child td {
            border-bottom: none;
        }

        .service-content table tr:nth-child(even) td {
            background-color: #f9fafb;
        }
    </style>
@endpush

@push('scripts')
    <script>
        function galleryCarousel() {
            return {
                current: 0,
                total: {{ $service->gallery_images ? count($service->gallery_images) : 0 }},
                visibleCount: 3,
                autoplayInterval: null,

                init() {
                    this.updateVisibleCount();
                    window.addEventListener('resize', () => this.updateVisibleCount());
                    this.startAutoplay();
                },

                updateVisibleCount() {
                    if (window.innerWidth < 640) {
                        this.visibleCount = 1;
                    } else if (window.innerWidth < 1024) {
                        this.visibleCount = 2;
                    } else {
                        this.visibleCount = 3;
                    }
                },

                maxIndex() {
                    return Math.max(0, this.total - this.visibleCount);
                },

                next() {
                    this.current = this.current >= this.maxIndex() ? 0 : this.current + 1;
                    this.resetAutoplay();
                },

                prev() {
                    this.current = this.current <= 0 ? this.maxIndex() : this.current - 1;
                    this.resetAutoplay();
                },

                goTo(index) {
                    this.current = Math.min(index, this.maxIndex());
                    this.resetAutoplay();
                },

                startAutoplay() {
                    this.autoplayInterval = setInterval(() => this.next(), 3500);
                },

                resetAutoplay() {
                    clearInterval(this.autoplayInterval);
                    this.startAutoplay();
                }
            }
        }
    </script>
@endpush
