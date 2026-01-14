@extends('frontend.layouts.app')

@section('title', 'Contact Us - Accent Networks')

@section('content')

    {{-- Hero --}}
    <section class="bg-gradient-to-br from-accent-blue to-accent-blue-light text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl">Get in touch with our team</p>
        </div>
    </section>

    {{-- Contact Content --}}
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">

                {{-- Contact Form --}}
                <div>
                    <h2 class="text-3xl font-bold mb-6">Send Us a Message</h2>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Your Name" required
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-accent-blue">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Your Email" required
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-accent-blue">
                        </div>
                        <div>
                            <input type="tel" name="phone" placeholder="Your Phone"
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-accent-blue">
                        </div>
                        <div>
                            <input type="text" name="subject" placeholder="Subject" required
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-accent-blue">
                        </div>
                        <div>
                            <textarea name="message" rows="5" placeholder="Your Message" required
                                class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-accent-blue"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-accent-blue text-white py-3 rounded-lg font-semibold hover:bg-accent-blue-light transition">
                            Send Message
                        </button>
                    </form>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h2 class="text-3xl font-bold mb-6">Get In Touch</h2>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-accent-blue/10 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-accent-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Address</h3>
                                <p class="text-accent-gray-medium">Plot No. 3 Suite 2, Musonda Ngosa Road<br>Villa
                                    Elizabetha, Lusaka, Zambia</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-accent-blue/10 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-accent-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Phone</h3>
                                <p class="text-accent-gray-medium">+260 211 235313<br>+260 977 753606</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-accent-blue/10 p-3 rounded-lg mr-4">
                                <svg class="w-6 h-6 text-accent-blue" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Email</h3>
                                <p class="text-accent-gray-medium">info@accent.co.zm</p>
                            </div>
                        </div>
                    </div>

                    {{-- Map --}}
                    <div class="mt-8 h-64 bg-gray-200 rounded-lg">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3846.3!2d28.3!3d-15.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTXCsDI0JzAwLjAiUyAyOMKwMTgnMDAuMCJF!5e0!3m2!1sen!2szm!4v1"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            class="rounded-lg"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
