{{-- Navigation Header --}}
<header class="bg-white shadow-sm sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo.jpg') }}" alt="Accent Networks" class="h-12">
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-accent-gray-dark hover:text-accent-blue transition">Home</a>
                <a href="{{ route('about') }}" class="text-accent-gray-dark hover:text-accent-blue transition">About
                    Us</a>

                {{-- Services Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                        class="text-gray-700 hover:text-[#003E7E] transition flex items-center">
                        Services
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-lg py-2 z-50">
                        <a href="{{ route('services.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">
                            All Services
                        </a>
                        <hr class="my-2">

                        @php
                            $navServices = \App\Models\Service::active()->ordered()->get();
                        @endphp

                        @foreach ($navServices as $navService)
                            <a href="{{ route('services.show', $navService->slug) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">
                                {{ $navService->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('projects.index') }}"
                    class="text-accent-gray-dark hover:text-accent-blue transition">Projects</a>
                <a href="{{ route('clients.index') }}"
                    class="text-accent-gray-dark hover:text-accent-blue transition">Our Clients</a>
                <a href="{{ route('blog.index') }}"
                    class="text-accent-gray-dark hover:text-accent-blue transition">News</a>
                <a href="{{ route('contact.index') }}"
                    class="bg-accent-blue text-white px-6 py-2 rounded-lg hover:bg-accent-blue-light transition">Contact
                    Us</a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-accent-gray-dark">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" x-transition class="md:hidden mt-4 pb-4">
            <a href="{{ route('services.3cx-phone-systems') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">3CX Phone
                Systems</a>
            <a href="{{ route('services.lan-wan-solutions') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">LAN and WAN
                Solutions</a>
            <a href="{{ route('services.telephone-management') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">Telephone
                Management</a>
            <a href="{{ route('services.consultancy-services') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">Consultancy
                Services</a>
            <a href="{{ route('services.ict-solutions') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#003E7E] hover:text-white transition">ICT
                Solutions</a>
        </div>
    </nav>
</header>
