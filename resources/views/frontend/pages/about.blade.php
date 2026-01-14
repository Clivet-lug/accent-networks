@extends('frontend.layouts.app')

@section('title', 'About Us - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">About Accent Networks</h1>
            <p class="text-xl">Leading ICT Solutions Provider Since 2005</p>
        </div>
    </section>

    {{-- Company Story --}}
    <section class="py-20">
        <div class="container mx-auto px-4 max-w-4xl">
            <h2 class="text-3xl font-bold mb-8">The Company</h2>
            <p class="text-lg text-accent-gray-medium mb-6">
                Accent Networks Ltd was established in 2005 and incorporated as a limited company in 2008. The company was
                started to provide a comprehensive range of Telecoms and Data services.
            </p>
            <p class="text-lg text-accent-gray-medium mb-6">
                The company is a reputable Information Communication Technology company in Zambia, managed by highly
                trained, experienced, dedicated, focused, motivated, self-driven and innovative professional team with a
                sense of entrepreneurship skills.
            </p>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl font-bold text-accent-blue mb-4">Our Vision</h3>
                    <p class="text-accent-gray-medium">
                        "Being a vehicle that supports growth of the Zambian emerging industry through the provision of
                        value adding solutions to our clients in telecommunications and Data networks"
                    </p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl font-bold text-accent-blue mb-4">Our Mission</h3>
                    <p class="text-accent-gray-medium">
                        To grow a successful, high value business in the ICT sector and improve our customers' business
                        efficiencies by providing niche products and solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Partners --}}
    <section class="py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-12">Our Partners</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach (['Siemon', '3CX', 'Cisco', 'MAN3000', 'Avaya', 'Panasonic'] as $partner)
                    <div class="bg-white p-6 rounded-lg shadow text-accent-gray-dark font-bold">{{ $partner }}</div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
