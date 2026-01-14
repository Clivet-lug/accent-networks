@extends('frontend.layouts.app')

@section('title', 'Our Clients - Accent Networks')

@section('content')

    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold">Our Clients</h1>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach ($clients as $client)
                    <div class="bg-white p-6 rounded-lg shadow text-center">
                        <p class="font-bold">{{ $client->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
