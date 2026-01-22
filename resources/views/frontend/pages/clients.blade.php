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

    {{-- Clients Grid --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            @if ($clients->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($clients as $client)
                        <div
                            class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2 group">
                            @if ($client->logo)
                                <img src="{{ Storage::url($client->logo) }}" alt="{{ $client->name }}"
                                    class="max-h-24 w-auto mx-auto grayscale group-hover:grayscale-0 transition">
                            @else
                                <p class="text-center font-bold text-gray-700 text-lg">{{ $client->name }}</p>
                            @endif

                            @if ($client->description)
                                <p class="text-center text-sm text-gray-600 mt-4">{{ $client->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No clients available.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
