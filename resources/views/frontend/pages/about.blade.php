@extends('frontend.layouts.app')
@section('title', 'About Us - Accent Networks')

@section('content')

    {{-- Hero Section --}}
    <section class="py-20" style="background-color: #003E7E;">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold text-white mb-4">About Accent Networks</h1>
            <div class="w-24 h-1 bg-white mx-auto mb-4"></div>
            <p class="text-xl text-white">Leading ICT Solutions Provider Since 2005</p>
        </div>
    </section>

    {{-- Company Story with Image --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">

                {{-- Image --}}
                <div>
                    <img src="{{ asset('images/about/office-building.jpg') }}" alt="Accent Networks Office"
                        class="rounded-2xl shadow-2xl w-full h-[500px] object-cover">
                </div>

                {{-- Content --}}
                <div>
                    <h2 class="text-4xl font-bold mb-6" style="color: #003E7E;">The Company</h2>
                    <div class="w-24 h-1 mb-6" style="background-color: #5FA9DD;"></div>

                    <p class="text-lg text-gray-600 mb-6">
                        Accent Networks Ltd was established in 2005 and incorporated as a limited company in 2008.
                        The company was started to provide a comprehensive range of Telecoms and Data services.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        The company is a reputable Information Communication Technology company in Zambia, managed by
                        highly trained, experienced, dedicated, focused, motivated, self-driven and innovative professional
                        team with a sense of entrepreneurship skills.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="py-20" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">

                <div class="bg-white p-10 rounded-2xl shadow-lg">
                    <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6"
                        style="background-color: #003E7E;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4" style="color: #003E7E;">Our Vision</h3>
                    <p class="text-gray-600">
                        "Being a vehicle that supports growth of the Zambian emerging industry through the provision
                        of value adding solutions to our clients in telecommunications and Data networks"
                    </p>
                </div>

                <div class="bg-white p-10 rounded-2xl shadow-lg">
                    <div class="w-16 h-16 rounded-xl flex items-center justify-center mb-6"
                        style="background-color: #5FA9DD;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4" style="color: #5FA9DD;">Our Mission</h3>
                    <p class="text-gray-600">
                        To grow a successful, high value business in the ICT sector and improve our customers' business
                        efficiencies by providing niche products and solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Photo Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Our Team</h2>
                <div class="w-24 h-1 mx-auto mb-4" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Managed by highly trained, experienced, and innovative professionals
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <img src="{{ asset('images/about/team-meeting.jpg') }}" alt="Accent Networks Team"
                    class="rounded-2xl shadow-2xl w-full h-[600px] object-cover">
            </div>
        </div>
    </section>

    {{-- Partners Section --}}
    <section class="py-20" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Our Technology Partners</h2>
            <div class="w-24 h-1 mx-auto mb-12" style="background-color: #5FA9DD;"></div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 max-w-5xl mx-auto">
                @foreach (['Siemon', '3CX', 'Cisco', 'MAN3000', 'Avaya', 'Panasonic'] as $partner)
                    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                        <p class="font-bold text-gray-700">{{ $partner }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
