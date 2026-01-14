@extends('frontend.layouts.app')

@section('title', $service->name . ' - Accent Networks')
@section('description', $service->short_description ?? Str::limit($service->description, 160))

@section('content')

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $service->name }}</h1>
                <p class="text-xl text-white/90">
                    {{ $service->short_description ?? Str::limit($service->description, 200) }}
                </p>
            </div>
        </div>
    </section>

    {{-- Service Details --}}
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                {{-- Main Description --}}
                <div class="prose prose-lg max-w-none mb-12">
                    <p class="text-lg text-accent-gray-medium leading-relaxed">
                        {{ $service->description }}
                    </p>
                </div>

                {{-- CTA Section --}}
                <div class="bg-gray-50 rounded-xl p-8 text-center">
                    <h3 class="text-2xl font-bold text-accent-gray-dark mb-4">
                        Interested in {{ $service->name }}?
                    </h3>
                    <p class="text-accent-gray-medium mb-6">
                        Contact us today to learn more about how we can help your business
                    </p>
                    <a href="{{ route('contact.index') }}"
                        class="inline-block bg-accent-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-accent-blue-light transition">
                        {{ $service->cta_text ?? 'Get a Quote' }}
                    </a>
                </div>

            </div>
        </div>
    </section>

    {{-- Related Services --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Other Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach (\App\Models\Service::active()->where('id', '!=', $service->id)->take(3)->get() as $otherService)
                    <a href="{{ route('services.show', $otherService->slug) }}"
                        class="bg-white rounded-lg shadow p-6 hover:shadow-xl transition">
                        <h3 class="text-xl font-bold text-accent-gray-dark mb-2">{{ $otherService->name }}</h3>
                        <p class="text-accent-gray-medium text-sm">
                            {{ Str::limit($otherService->short_description ?? $otherService->description, 100) }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection
