@extends('frontend.layouts.app')

@section('title', $service->name . ' - Accent Networks')
@section('description', $service->short_description ?? Str::limit($service->description, 160))

@section('content')

    {{-- Hero Section with Featured Image --}}
    <section class="relative py-32 overflow-hidden">
        @if ($service->featured_image)
            @php
                $imagePath = str_contains($service->featured_image, 'service-images/')
                    ? asset('storage/' . $service->featured_image)
                    : asset('storage/service-images/' . $service->featured_image);
            @endphp
            {{-- Background Image --}}
            <div class="absolute inset-0">
                <img src="{{ $imagePath }}"
                     alt="{{ $service->name }}"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(0, 62, 126, 0.95) 0%, rgba(95, 169, 221, 0.85) 100%);"></div>
            </div>
        @else
            <div class="absolute inset-0" style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);"></div>
        @endif

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">{{ $service->name }}</h1>
                <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                @if($service->short_description)
                    <p class="text-xl md:text-2xl text-white/90">
                        {{ $service->short_description }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    {{-- Main Description --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg max-w-none">
                    <p class="text-lg leading-relaxed" style="color: #6E7173;">
                        {{ $service->description }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Before/After Images --}}
    @if ($service->before_image || $service->after_image)
        <section class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">See The Difference</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @if ($service->before_image)
                            <div class="relative">
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="bg-red-500 text-white px-4 py-2 rounded-lg font-semibold">Before</span>
                                </div>
                                @php
                                    $beforePath = str_contains($service->before_image, 'service-images/')
                                        ? asset('storage/' . $service->before_image)
                                        : asset('storage/service-images/' . $service->before_image);
                                @endphp
                                <img src="{{ $beforePath }}"
                                     alt="Before - {{ $service->name }}"
                                     class="w-full h-80 object-cover rounded-xl shadow-2xl">
                            </div>
                        @endif

                        @if ($service->after_image)
                            <div class="relative">
                                <div class="absolute top-4 left-4 z-10">
                                    <span class="bg-green-500 text-white px-4 py-2 rounded-lg font-semibold">After</span>
                                </div>
                                @php
                                    $afterPath = str_contains($service->after_image, 'service-images/')
                                        ? asset('storage/' . $service->after_image)
                                        : asset('storage/service-images/' . $service->after_image);
                                @endphp
                                <img src="{{ $afterPath }}"
                                     alt="After - {{ $service->name }}"
                                     class="w-full h-80 object-cover rounded-xl shadow-2xl">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Image Gallery --}}
    @if ($service->gallery_images && count($service->gallery_images) > 0)
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">Gallery</h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($service->gallery_images as $galleryImage)
                            @php
                                $galleryPath = str_contains($galleryImage, 'service-images/')
                                    ? asset('storage/' . $galleryImage)
                                    : asset('storage/service-images/gallery/' . $galleryImage);
                            @endphp
                            <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all">
                                <img src="{{ $galleryPath }}"
                                     alt="{{ $service->name }} Gallery"
                                     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Key Features Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">Key Features & Benefits</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4" style="background-color: #003E7E;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">Professional Installation</h3>
                        <p class="text-gray-600">Expert team ensures proper setup and configuration</p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4" style="background-color: #5FA9DD;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">Fast Deployment</h3>
                        <p class="text-gray-600">Quick implementation to get you up and running</p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4" style="background-color: #003E7E;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">24/7 Support</h3>
                        <p class="text-gray-600">Round-the-clock technical assistance available</p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4" style="background-color: #5FA9DD;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">Secure & Reliable</h3>
                        <p class="text-gray-600">Enterprise-grade security and uptime</p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4" style="background-color: #003E7E;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">Cost-Effective</h3>
                        <p class="text-gray-600">Competitive pricing with flexible payment options</p>
                    </div>

                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4" style="background-color: #5FA9DD;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3" style="color: #003E7E;">Scalable Solutions</h3>
                        <p class="text-gray-600">Grows with your business needs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20" style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h2 class="text-4xl font-bold mb-6">Interested in {{ $service->name }}?</h2>
                <p class="text-xl text-white/90 mb-10">
                    Contact us today to learn more about how we can help transform your business
                </p>
                <a href="{{ $service->cta_link ?? route('contact.index') }}"
                    class="inline-block bg-white px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl"
                    style="color: #003E7E;">
                    {{ $service->cta_text ?? 'Get a Quote' }}
                </a>
            </div>
        </div>
    </section>

    {{-- Related Services --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">Our Other Services</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                @foreach (\App\Models\Service::active()->where('id', '!=', $service->id)->ordered()->take(3)->get() as $otherService)
                    <a href="{{ route('services.show', $otherService->slug) }}"
                        class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2">

                        @if($otherService->featured_image)
                            @php
                                $otherImagePath = str_contains($otherService->featured_image, 'service-images/')
                                    ? asset('storage/' . $otherService->featured_image)
                                    : asset('storage/service-images/' . $otherService->featured_image);
                            @endphp
                            <div class="aspect-video overflow-hidden">
                                <img src="{{ $otherImagePath }}"
                                     alt="{{ $otherService->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                        @endif

                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">{{ $otherService->name }}</h3>
                            <p class="text-gray-600 text-sm">
                                {{ Str::limit($otherService->short_description ?? $otherService->description, 100) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection
