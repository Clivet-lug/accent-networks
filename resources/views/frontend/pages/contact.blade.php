@extends('frontend.layouts.app')
@section('title', 'Contact Us - Accent Networks')

@section('content')

    {{-- Hero Section --}}
    <section class="py-20" style="background-color: #003E7E;">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold text-white mb-4">Contact Us</h1>
            <div class="w-24 h-1 bg-white mx-auto mb-4"></div>
            <p class="text-xl text-white">Get in touch with our team</p>
        </div>
    </section>

    {{-- Contact Content --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">

                {{-- Contact Form --}}
                <div>
                    <h2 class="text-3xl font-bold mb-6" style="color: #003E7E;">Send Us a Message</h2>
                    <div class="w-24 h-1 mb-8" style="background-color: #5FA9DD;"></div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 text-green-700 p-4 mb-6 rounded" style="border-color: #5FA9DD;">
                            <p class="font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name *</label>
                            <input type="text" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent"
                                placeholder="John Doe">
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Email *</label>
                            <input type="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent"
                                placeholder="john@example.com">
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent"
                                placeholder="+260 XXX XXXXXX">
                            @error('phone')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Subject *</label>
                            <input type="text" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent"
                                placeholder="How can we help?">
                            @error('subject')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Message *</label>
                            <textarea name="message" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003E7E] focus:border-transparent"
                                placeholder="Tell us about your project or inquiry..."></textarea>
                            @error('message')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full text-white py-4 rounded-lg font-semibold hover:opacity-90 transition shadow-lg"
                            style="background-color: #003E7E;">
                            Send Message
                        </button>
                    </form>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h2 class="text-3xl font-bold mb-6" style="color: #003E7E;">Get In Touch</h2>
                    <div class="w-24 h-1 mb-8" style="background-color: #5FA9DD;"></div>

                    <div class="space-y-6 mb-12">

                        {{-- Address --}}
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                style="background-color: rgba(0, 62, 126, 0.1);">
                                <svg class="w-6 h-6" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Address</h3>
                                <p class="text-gray-600">Plot No. 3 Suite 2, Musonda Ngosa Road<br>Villa Elizabetha, Lusaka,
                                    Zambia</p>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                style="background-color: rgba(0, 62, 126, 0.1);">
                                <svg class="w-6 h-6" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Phone</h3>
                                <p class="text-gray-600">+260 211 235313<br>+260 977 753606</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                style="background-color: rgba(0, 62, 126, 0.1);">
                                <svg class="w-6 h-6" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600">info@accent.co.zm</p>
                            </div>
                        </div>

                        {{-- Business Hours --}}
                        <div class="flex items-start">
                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4 flex-shrink-0"
                                style="background-color: rgba(0, 62, 126, 0.1);">
                                <svg class="w-6 h-6" style="color: #003E7E;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">Business Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday - Sunday: Closed
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Map --}}
                    <div class="h-64 bg-gray-200 rounded-xl overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3846.3!2d28.3!3d-15.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDI0JzAwLjAiUyAyOMKwMTgnMDAuMCJF!5e0!3m2!1sen!2szm!4v1"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
