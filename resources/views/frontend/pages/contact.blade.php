@extends('frontend.layouts.app')
@section('title', 'Contact Us - Accent Networks')

@section('content')

    {{-- Hero Section with Gradient --}}
    <section class="relative py-32 overflow-hidden" style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center text-white">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Get In Touch</h1>
                <div class="w-24 h-1 bg-white mx-auto mb-6"></div>
                <p class="text-xl md:text-2xl text-white/90">
                    Let's discuss how we can help transform your business with our ICT solutions
                </p>
            </div>
        </div>
    </section>

    {{-- Main Contact Section --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-5 gap-12 max-w-7xl mx-auto">

                {{-- Contact Info Sidebar (2 columns) --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Quick Contact Cards --}}
                    <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4"
                            style="background-color: #003E7E;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2" style="color: #003E7E;">Visit Our Office</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Plot No. 3 Suite 2, Musonda Ngosa Road<br>
                            Villa Elizabetha, Lusaka, Zambia
                        </p>
                        <a href="https://maps.google.com/?q=Accent+Networks+zambia" target="_blank"
                            class="inline-flex items-center mt-4 font-semibold" style="color: #5FA9DD;">
                            Get Directions
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4"
                            style="background-color: #5FA9DD;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2" style="color: #003E7E;">Call Us</h3>
                        <div class="space-y-2">
                            <a href="tel:+260211235313" class="block text-gray-600 hover:text-[#003E7E] transition">
                                +260 211 235313
                            </a>
                            <a href="tel:+260977753606" class="block text-gray-600 hover:text-[#003E7E] transition">
                                +260 977 753606
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4"
                            style="background-color: #003E7E;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2" style="color: #003E7E;">Email Us</h3>
                        <a href="mailto:info@accent.co.zm" class="text-gray-600 hover:text-[#003E7E] transition">
                            info@accent.co.zm
                        </a>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mb-4"
                            style="background-color: #5FA9DD;">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-xl mb-2" style="color: #003E7E;">Business Hours</h3>
                        <div class="space-y-1 text-gray-600">
                            <p><strong>Monday - Friday:</strong><br>8:00 AM - 5:00 PM</p>
                            <p><strong>Saturday - Sunday:</strong><br>Closed</p>
                        </div>
                    </div>
                </div>

                {{-- Contact Form (3 columns) --}}
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-12">
                        <h2 class="text-3xl font-bold mb-3" style="color: #003E7E;">Send Us a Message</h2>
                        <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you within 24 hours</p>

                        @if (session('success'))
                            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-green-500 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <p class="font-semibold text-green-700">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-6">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Your Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" required value="{{ old('name') }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent transition"
                                        placeholder="John Doe">
                                    @error('name')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Your Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" name="email" required value="{{ old('email') }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent transition"
                                        placeholder="john@example.com">
                                    @error('email')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent transition"
                                        placeholder="+260 XXX XXXXXX">
                                    @error('phone')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Subject <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="subject" required value="{{ old('subject') }}"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent transition"
                                        placeholder="How can we help?">
                                    @error('subject')
                                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Your Message <span class="text-red-500">*</span>
                                </label>
                                <textarea name="message" rows="6" required
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent transition resize-none"
                                    placeholder="Tell us about your project or inquiry...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Attachment (Optional)</label>
                                <input type="file" name="attachment" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent transition">
                                <p class="text-sm text-gray-500 mt-1">Max file size: 5MB</p>
                                @error('attachment')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full text-white py-4 rounded-lg font-bold text-lg hover:shadow-xl transition transform hover:scale-[1.02]"
                                style="background: linear-gradient(135deg, #003E7E 0%, #5FA9DD 100%);">
                                Send Message
                                <svg class="w-5 h-5 inline-block ml-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="h-96 bg-gray-200">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3846.185889276!2d28.275134876534196!3d-15.407182585246868!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1940f5cc7c6e9729%3A0x2b1e6e1d4a9d4b9a!2sAccent%20Networks%20zambia!5e0!3m2!1sen!2szm!4v1738444800000!5m2!1sen!2szm"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>

    {{-- Why Contact Us Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4" style="color: #003E7E;">Why Choose Accent Networks?</h2>
                    <div class="w-24 h-1 mx-auto mb-6" style="background-color: #5FA9DD;"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                    <div class="p-6">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #003E7E;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">24/7 Support</h3>
                        <p class="text-gray-600">Round-the-clock assistance</p>
                    </div>

                    <div class="p-6">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #5FA9DD;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Fast Response</h3>
                        <p class="text-gray-600">Reply within 24 hours</p>
                    </div>

                    <div class="p-6">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #003E7E;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Expert Team</h3>
                        <p class="text-gray-600">Experienced professionals</p>
                    </div>

                    <div class="p-6">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center"
                            style="background-color: #5FA9DD;">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-2" style="color: #003E7E;">Trusted Since 2005</h3>
                        <p class="text-gray-600">19+ years of excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
