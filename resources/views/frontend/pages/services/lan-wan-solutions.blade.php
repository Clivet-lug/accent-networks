@extends('frontend.layouts.app')
@section('title', 'LAN and WAN Solutions - Accent Networks')
@section('content')

    <section class="py-20 bg-gradient-to-br from-[#003E7E] to-[#5FA9DD] text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">LAN and WAN Solutions</h1>
            <p class="text-xl">Enterprise Network Infrastructure</p>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="prose prose-lg max-w-none">
                <p class="text-lg mb-6">We design, install, and maintain robust Local Area Network (LAN) and Wide Area
                    Network (WAN) solutions for businesses of all sizes.</p>

                <h2 class="text-2xl font-bold mb-4" style="color: #003E7E;">Our Services Include:</h2>
                <ul class="mb-8">
                    <li>Structured cabling systems</li>
                    <li>Network design and implementation</li>
                    <li>Fiber optic installations</li>
                    <li>Wireless network solutions</li>
                    <li>Network security implementation</li>
                    <li>Network monitoring and maintenance</li>
                </ul>

                <div class="bg-gray-50 p-8 rounded-xl text-center my-8">
                    <h3 class="text-2xl font-bold mb-4" style="color: #003E7E;">Need Network Solutions?</h3>
                    <p class="mb-6">Let's discuss your network infrastructure needs</p>
                    <a href="{{ route('contact.index') }}"
                        class="inline-block px-8 py-3 rounded-lg font-semibold text-white hover:opacity-90 transition"
                        style="background: #003E7E;">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
