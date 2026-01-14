@extends('frontend.layouts.app')

@section('title', 'Our Services - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Our Services</h1>
            <p class="text-xl">Comprehensive ICT solutions for your business</p>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div
                        class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all transform hover:-translate-y-2">
                        {{-- Icon --}}
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-accent-blue to-purple-500 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                @endforeach
            </div>
        </div>
    </section>

@endsection
