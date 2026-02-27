@extends('frontend.layouts.app')
@section('title', 'About Us - Accent Networks')

@section('content')

    {{-- Hero Section with Background Image --}}
    <section class="relative py-32 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/about/team1.png') }}" alt="Accent Networks"
                class="w-full h-full object-cover">
            <div class="absolute inset-0"
                style="background: linear-gradient(135deg, rgba(0, 62, 126, 0.88) 0%, rgba(95, 169, 221, 0.78) 100%);"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">About Accent Networks</h1>
                <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                <p class="text-xl md:text-2xl text-white/90">
                    Leading ICT Solutions Provider Since 2005
                </p>
                <p class="mt-4 text-lg text-white/80">
                    Delivering excellence in telecommunications and data networks across Zambia
                </p>
            </div>
        </div>
    </section>

    {{-- Company Story with Image --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center max-w-6xl mx-auto">

                {{-- Image --}}
                <div class="relative">
                    <img src="{{ asset('images/about/office-building.jpg') }}" alt="Accent Networks Office"
                        class="rounded-2xl shadow-2xl w-full h-[500px] object-cover">

                    {{-- Stats Overlay --}}
                    <div class="absolute -bottom-8 -right-8 text-white p-8 rounded-2xl shadow-2xl"
                        style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
                        <div class="text-center">
                            <p class="text-5xl font-bold mb-2">19+</p>
                            <p class="text-sm">Years Experience</p>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                <div>
                    <h2 class="text-4xl font-bold mb-6" style="color: #003E7E;">The Company</h2>
                    <div class="w-24 h-1 mb-6" style="background-color: #5FA9DD;"></div>

                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Accent Networks Ltd was established in 2005 and incorporated as a limited company in 2008.
                        The company was started to provide a comprehensive range of Telecoms and Data services.
                    </p>

                    <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                        The company is a reputable Information Communication Technology company in Zambia, managed by
                        highly trained, experienced, dedicated, focused, motivated, self-driven and innovative professional
                        team with a sense of entrepreneurship skills.
                    </p>

                    {{-- Key Points --}}
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0"
                                style="background-color: rgba(95, 169, 221, 0.2);">
                                <svg class="w-4 h-4" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700">Comprehensive ICT solutions tailored to your needs</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0"
                                style="background-color: rgba(95, 169, 221, 0.2);">
                                <svg class="w-4 h-4" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700">Trusted by leading organizations across Zambia</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0"
                                style="background-color: rgba(95, 169, 221, 0.2);">
                                <svg class="w-4 h-4" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-gray-700">Partners with global technology leaders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="py-20" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">

                <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition group">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition"
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
                    <p class="text-gray-600 leading-relaxed">
                        "Being a vehicle that supports growth of the Zambian emerging industry through the provision
                        of value adding solutions to our clients in telecommunications and Data networks"
                    </p>
                </div>

                <div class="bg-white p-10 rounded-2xl shadow-xl hover:shadow-2xl transition group">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition"
                        style="background-color: #5FA9DD;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4" style="color: #5FA9DD;">Our Mission</h3>
                    <p class="text-gray-600 leading-relaxed">
                        To grow a successful, high value business in the ICT sector and improve our customers' business
                        efficiencies by providing niche products and solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Values --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Our Core Values</h2>
                <div class="w-24 h-1 mx-auto mb-4" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    The principles that guide everything we do
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <div class="text-center p-6 rounded-xl hover:shadow-xl transition bg-gray-50">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: #003E7E;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Integrity</h3>
                    <p class="text-gray-600 text-sm">Honest and ethical in all dealings</p>
                </div>

                <div class="text-center p-6 rounded-xl hover:shadow-xl transition bg-gray-50">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: #5FA9DD;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Innovation</h3>
                    <p class="text-gray-600 text-sm">Continuous improvement and creativity</p>
                </div>

                <div class="text-center p-6 rounded-xl hover:shadow-xl transition bg-gray-50">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: #003E7E;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Excellence</h3>
                    <p class="text-gray-600 text-sm">Committed to superior quality</p>
                </div>

                <div class="text-center p-6 rounded-xl hover:shadow-xl transition bg-gray-50">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                        style="background-color: #5FA9DD;">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Customer Focus</h3>
                    <p class="text-gray-600 text-sm">Your success is our priority</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Technology Partners Section with Logos --}}
    <section class="py-20" style="background-color: #f8f9fa;">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Our Technology Partners</h2>
                <div class="w-24 h-1 mx-auto mb-6" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    We partner with world-class technology leaders to deliver cutting-edge solutions
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-7 gap-8 max-w-6xl mx-auto">
                @php
                    $partners = [
                        ['name' => 'Siemon', 'country' => 'USA', 'logo' => 'siemon.png'],
                        ['name' => '3CX', 'country' => 'Cyprus', 'logo' => '3CX.png'],
                        ['name' => 'Cisco', 'country' => 'USA', 'logo' => 'cisco.png'],
                        ['name' => 'MAN3000', 'country' => 'South Africa', 'logo' => 'man3000.png'],
                        ['name' => 'Unifi', 'country' => 'Zambia', 'logo' => 'unifi.png'],
                        ['name' => 'Ajax', 'country' => 'Zambia', 'logo' => 'ajax.png'],
                        ['name' => 'Globalsix', 'country' => 'Ukraine', 'logo' => 'global6.png'],
                    ];
                @endphp

                @foreach ($partners as $partner)
                    <div
                        class="bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2 group">
                        <div class="h-20 flex items-center justify-center mb-4">
                            @if (file_exists(public_path('images/partners/' . $partner['logo'])))
                                <img src="{{ asset('images/partners/' . $partner['logo']) }}" alt="{{ $partner['name'] }}"
                                    class="max-h-16 w-auto mx-auto group-hover:scale-110 transition-transform">
                            @else
                                <div class="w-16 h-16 rounded-full flex items-center justify-center"
                                    style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
                                    <span class="text-white font-bold text-xl">{{ substr($partner['name'], 0, 1) }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="text-center">
                            <p class="font-bold text-gray-900 mb-1">{{ $partner['name'] }}</p>
                            <p class="text-xs text-gray-500">{{ $partner['country'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Team Photo Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Our Team</h2>
                <div class="w-24 h-1 mx-auto mb-6" style="background-color: #5FA9DD;"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Managed by highly trained, experienced, and innovative professionals
                </p>
            </div>

            <div class="max-w-5xl mx-auto">
                <div class="relative">
                    <img src="{{ asset('images/about/team-meeting.jpg') }}" alt="Accent Networks Team"
                        class="rounded-2xl shadow-2xl w-full h-[600px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-2xl"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-12 text-white">
                        <h3 class="text-3xl font-bold mb-2">Dedicated to Your Success</h3>
                        <p class="text-lg text-white/90">
                            Our team of experts is committed to delivering exceptional ICT solutions
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Company Profile Download Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="relative rounded-2xl shadow-2xl overflow-hidden">

                    {{-- Background Image --}}
                    <div class="absolute inset-0">
                        @if (file_exists(public_path('images/about/handshake.jpg')))
                            <img src="{{ asset('images/about/handshake.jpg') }}" alt="Company Profile"
                                class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0"
                            style="background: linear-gradient(135deg, rgba(0, 62, 126, 0.45) 0%, rgba(95, 169, 221, 0.30) 100%);">
                        </div>
                    </div>

                    {{-- Pattern Overlay --}}
                    {{-- <div class="absolute inset-0 opacity-10">
                        <div class="absolute inset-0"
                            style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
                        </div>
                    </div> --}}

                    <div class="relative z-10 grid md:grid-cols-2 gap-8 items-center p-12">
                        <div class="text-white">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center mb-6"
                                style="background-color: rgba(255, 255, 255, 0.2);">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-bold mb-4">Company Profile</h3>
                            <p class="text-white/90 mb-6 leading-relaxed">
                                Download our comprehensive company profile to learn more about our services,
                                expertise, and track record in the ICT industry.
                            </p>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-white/90">Complete service portfolio</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-white/90">Client success stories</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-sm text-white/90">Company credentials</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl p-8 shadow-xl">
                            <div class="text-center">
                                <div class="w-20 h-20 mx-auto mb-6 rounded-full flex items-center justify-center"
                                    style="background-color: rgba(0, 62, 126, 0.1);">
                                    <svg class="w-10 h-10" style="color: #003E7E;" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z"></path>
                                        <path fill="white" d="M14 2v6h6"></path>
                                    </svg>
                                </div>
                                <h4 class="text-2xl font-bold mb-2" style="color: #003E7E;">Download Profile</h4>
                                <p class="text-gray-600 text-sm mb-6">PDF Format • 2.5 MB</p>
                                <a href="{{ asset('downloads/accent-networks-company-profile.pdf') }}"
                                    download="Accent-Networks-Company-Profile.pdf"
                                    class="inline-flex items-center justify-center w-full text-white px-8 py-4 rounded-lg font-bold text-lg hover:opacity-90 transition transform hover:scale-105 shadow-lg"
                                    style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Download PDF
                                </a>
                                <p class="text-xs text-gray-500 mt-4">
                                    Last updated: {{ date('F Y') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20" style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Work With Us?</h2>
            <p class="text-xl text-white/90 mb-10 max-w-2xl mx-auto">
                Let's discuss how we can help transform your business with our ICT solutions
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}"
                    class="inline-block bg-white px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl"
                    style="color: #003E7E;">
                    Contact Us
                </a>
                <a href="{{ route('services.index') }}"
                    class="inline-block border-2 border-white text-white px-10 py-4 rounded-lg font-bold text-lg hover:bg-white/10 transition transform hover:scale-105 shadow-xl">
                    Our Services
                </a>
            </div>
        </div>
    </section>

@endsection
