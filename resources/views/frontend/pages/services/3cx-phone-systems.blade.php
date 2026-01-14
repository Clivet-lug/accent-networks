@extends('frontend.layouts.app')
@section('title', '3CX Phone Systems - Accent Networks')
@section('content')

    <section class="py-20 bg-gradient-to-br from-[#003E7E] to-[#5FA9DD] text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">3CX Phone Systems</h1>
            <p class="text-xl">Modern IP Phone System with Call Center Capabilities</p>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="prose prose-lg max-w-none">
                <p class="text-lg mb-6">Our 3CX phone system solutions provide businesses with cutting-edge VoIP technology,
                    enabling seamless communication across multiple devices and locations.</p>

                <h2 class="text-2xl font-bold mb-4" style="color: #003E7E;">Key Features:</h2>
                <ul class="mb-8">
                    <li>Call recording and monitoring</li>
                    <li>Video conferencing</li>
                    <li>Advanced call routing</li>
                    <li>Mobile apps for iOS and Android</li>
                    <li>CRM integrations</li>
                    <li>Web conferencing</li>
                </ul>

                <div class="bg-gray-50 p-8 rounded-xl text-center my-8">
                    <h3 class="text-2xl font-bold mb-4" style="color: #003E7E;">Interested in 3CX Phone Systems?</h3>
                    <p class="mb-6">Contact us today to learn more about how we can help your business</p>
                    <a href="{{ route('contact.index') }}"
                        class="inline-block px-8 py-3 rounded-lg font-semibold text-white hover:opacity-90 transition"
                        style="background: #003E7E;">
                        Get a Quote
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
