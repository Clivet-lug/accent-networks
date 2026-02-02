@extends('frontend.layouts.app')

@section('title', 'Our Services - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="relative py-32 overflow-hidden" style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Our Services</h1>
                <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                <p class="text-xl md:text-2xl text-white/90">
                    Comprehensive ICT solutions designed to transform your business operations
                </p>
            </div>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300">

                        {{-- Featured Image or Gradient Background --}}
                        @if ($service->featured_image)
                            @php
                                $imagePath = str_contains($service->featured_image, 'service-images/')
                                    ? asset('storage/' . $service->featured_image)
                                    : asset('storage/service-images/' . $service->featured_image);
                            @endphp
                            <div class="aspect-video relative overflow-hidden">
                                <img src="{{ $imagePath }}" alt="{{ $service->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                {{-- Gradient Overlay --}}
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-[#003E7E] via-[#003E7E]/50 to-transparent">
                                </div>
                            </div>
                        @else
                            {{-- Fallback Gradient with Icon --}}
                            <div class="aspect-video relative"
                                style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-white/20" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        @endif

                        {{-- Content --}}
                        <div class="bg-white p-8">
                            <h3 class="text-2xl font-bold mb-3" style="color: #003E7E;">
                                {{ $service->name }}
                            </h3>

                            <p class="text-gray-600 mb-6 leading-relaxed">
                                {{ $service->short_description ?? Str::limit($service->description, 120) }}
                            </p>

                            <a href="{{ route('services.show', $service->slug) }}"
                                class="inline-flex items-center font-semibold group-hover:translate-x-2 transition-transform duration-300"
                                style="color: #5FA9DD;">
                                Learn More
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Why Choose Accent Networks?</h2>
                    <div class="w-24 h-1 mx-auto mb-6" style="background-color: #5FA9DD;"></div>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        With over 19 years of experience, we deliver reliable, innovative ICT solutions
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-8 rounded-xl bg-gray-50 hover:bg-blue-50 transition">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #003E7E;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Trusted & Reliable</h3>
                        <p class="text-gray-600">Serving Zambia's leading organizations since 2005</p>
                    </div>

                    <div class="text-center p-8 rounded-xl bg-gray-50 hover:bg-blue-50 transition">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #5FA9DD;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Fast Implementation</h3>
                        <p class="text-gray-600">Quick deployment without compromising quality</p>
                    </div>

                    <div class="text-center p-8 rounded-xl bg-gray-50 hover:bg-blue-50 transition">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #003E7E;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">24/7 Support</h3>
                        <p class="text-gray-600">Round-the-clock technical assistance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20" style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Get Started?</h2>
            <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                Let's discuss how our services can help transform your business operations
            </p>
            <a href="{{ route('contact.index') }}"
                class="inline-block bg-white px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl"
                style="color: #003E7E;">
                Contact Us Today
            </a>
        </div>
    </section>

@endsection
