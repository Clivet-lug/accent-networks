@extends('frontend.layouts.app')
@section('title', 'Our Clients - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="py-20" style="background-color: #003E7E;">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold text-white mb-4">Our Clients</h1>
            <div class="w-24 h-1 bg-white mx-auto mb-4"></div>
            <p class="text-xl text-white">Trusted by Zambia's leading organizations</p>
        </div>
    </section>

    {{-- Introduction Text --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <p class="text-lg leading-relaxed" style="color: #6E7173;">
                    We are proud to work with forward-thinking businesses and organizations that trust us to deliver
                    reliable, secure, and innovative technology solutions. From startups to established enterprises, our
                    clients span multiple industries, all united by a shared goal of growth, efficiency, and digital
                    transformation.
                </p>
            </div>
        </div>
    </section>

    {{-- Clients Grid --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            @if ($clients->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($clients as $client)
                        @if ($client->website_url)
                            {{-- Clickable Logo --}}
                            <a href="{{ $client->website_url }}" target="_blank" rel="noopener noreferrer"
                                class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2 hover:scale-105 group flex items-center justify-center">
                                @if ($client->logo)
                                    <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}"
                                        class="max-h-24 w-auto mx-auto transition-all">
                                @else
                                    <p class="text-center font-bold text-lg" style="color: #003E7E;">{{ $client->name }}</p>
                                @endif
                            </a>
                        @else
                            {{-- Non-clickable Logo --}}
                            <div
                                class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2 hover:scale-105 group flex items-center justify-center">
                                @if ($client->logo)
                                    <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}"
                                        class="max-h-24 w-auto mx-auto transition-all">
                                @else
                                    <p class="text-center font-bold text-lg" style="color: #003E7E;">{{ $client->name }}</p>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>

                {{-- Optional: Description Section --}}
                @if ($clients->where('description', '!=', null)->count() > 0)
                    <div class="mt-16">
                        <h2 class="text-3xl font-bold text-center mb-12" style="color: #003E7E;">Client Success Stories</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                            @foreach ($clients->where('description', '!=', null) as $client)
                                <div class="bg-gray-50 p-6 rounded-xl">
                                    @if ($client->logo)
                                        <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}"
                                            class="max-h-16 w-auto mx-auto mb-4">
                                    @endif
                                    <h3 class="text-xl font-bold text-center mb-3" style="color: #003E7E;">
                                        {{ $client->name }}</h3>
                                    <p class="text-center text-sm" style="color: #6E7173;">{{ $client->description }}</p>
                                    @if ($client->website_url)
                                        <div class="text-center mt-4">
                                            <a href="{{ $client->website_url }}" target="_blank"
                                                class="text-sm font-semibold hover:underline" style="color: #5FA9DD;">
                                                Visit Website →
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No clients available.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-[#003E7E] to-[#5FA9DD] text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Join Our Growing Family?</h2>
            <p class="text-xl mb-10 text-white/90 max-w-2xl mx-auto">
                Partner with us and experience the same level of excellence that our clients trust
            </p>
            <a href="{{ route('contact.index') }}"
                class="inline-block bg-white px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105"
                style="color: #003E7E;">
                Get Started Today
            </a>
        </div>
    </section>

@endsection
