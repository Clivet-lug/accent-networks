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
                {{-- Home --}}
                <a href="{{ route('home') }}"
                    class="font-semibold transition-colors relative group {{ request()->routeIs('home') ? 'text-[#003E7E]' : 'text-gray-700 hover:text-[#003E7E]' }}">
                    Home
                    @if (request()->routeIs('home'))
                        <span class="absolute bottom-[-8px] left-0 w-full h-0.5 bg-[#003E7E]"></span>
                    @else
                        <span
                            class="absolute bottom-[-8px] left-0 w-0 h-0.5 bg-[#003E7E] group-hover:w-full transition-all duration-300"></span>
                    @endif
                </a>

                {{-- About Us --}}
                <a href="{{ route('about') }}"
                    class="font-semibold transition-colors relative group {{ request()->routeIs('about') ? 'text-[#003E7E]' : 'text-gray-700 hover:text-[#003E7E]' }}">
                    About Us
                    @if (request()->routeIs('about'))
                        <span class="absolute bottom-[-8px] left-0 w-full h-0.5 bg-[#003E7E]"></span>
                    @else
                        <span
                            class="absolute bottom-[-8px] left-0 w-0 h-0.5 bg-[#003E7E] group-hover:w-full transition-all duration-300"></span>
                    @endif
                </a>

                {{-- Services Dropdown with Better Hover --}}
                <div class="relative" x-data="{
                    open: false,
                    closeTimer: null,
                    openDropdown() {
                        clearTimeout(this.closeTimer);
                        this.open = true;
                    },
                    closeDropdown() {
                        this.closeTimer = setTimeout(() => {
                            this.open = false;
                        }, 300);
                    }
                }" @mouseenter="openDropdown()"
                    @mouseleave="closeDropdown()">

                    <button
                        class="font-semibold transition-colors relative group flex items-center {{ request()->routeIs('services.*') ? 'text-[#003E7E]' : 'text-gray-700 hover:text-[#003E7E]' }}">
                        Services
                        <svg class="w-4 h-4 ml-1 transition-transform" :class="open ? 'rotate-180' : ''" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        @if (request()->routeIs('services.*'))
                            <span class="absolute bottom-[-8px] left-0 w-full h-0.5 bg-[#003E7E]"></span>
                        @else
                            <span
                                class="absolute bottom-[-8px] left-0 w-0 h-0.5 bg-[#003E7E] group-hover:w-full transition-all duration-300"></span>
                        @endif
                    </button>

                    {{-- Dropdown with padding for easier hovering --}}
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95" @mouseenter="openDropdown()"
                        @mouseleave="closeDropdown()"
                        class="absolute left-0 mt-2 w-64 bg-white rounded-lg shadow-xl border border-gray-100 py-2"
                        style="display: none;">

                        <a href="{{ route('services.index') }}"
                            class="block px-4 py-3 text-sm font-semibold hover:bg-gray-50 transition {{ request()->routeIs('services.index') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                            All Services
                        </a>

                        <hr class="my-2 border-gray-200">

                        {{-- Static Service Pages --}}
                        <a href="{{ route('services.3cx-phone-systems') }}"
                            class="block px-4 py-3 text-sm hover:bg-gray-50 transition {{ request()->routeIs('services.3cx-phone-systems') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                            3CX Phone Systems
                        </a>

                        <a href="{{ route('services.lan-wan-solutions') }}"
                            class="block px-4 py-3 text-sm hover:bg-gray-50 transition {{ request()->routeIs('services.lan-wan-solutions') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                            LAN & WAN Solutions
                        </a>

                        <a href="{{ route('services.telephone-management') }}"
                            class="block px-4 py-3 text-sm hover:bg-gray-50 transition {{ request()->routeIs('services.telephone-management') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                            Telephone Management
                        </a>

                        <a href="{{ route('services.consultancy-services') }}"
                            class="block px-4 py-3 text-sm hover:bg-gray-50 transition {{ request()->routeIs('services.consultancy-services') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                            Consultancy Services
                        </a>

                        <a href="{{ route('services.ict-solutions') }}"
                            class="block px-4 py-3 text-sm hover:bg-gray-50 transition {{ request()->routeIs('services.ict-solutions') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                            ICT Solutions
                        </a>

                        {{-- Dynamic Services from Database --}}
                        @php
                            $navServices = \App\Models\Service::active()->ordered()->limit(5)->get();
                        @endphp

                        @if ($navServices->count() > 0)
                            <hr class="my-2 border-gray-200">
                            @foreach ($navServices as $navService)
                                <a href="{{ route('services.show', $navService->slug) }}"
                                    class="block px-4 py-3 text-sm hover:bg-gray-50 transition {{ request()->is('services/' . $navService->slug) ? 'text-[#003E7E] bg-blue-50' : 'text-gray-700' }}">
                                    {{ $navService->name }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- Projects --}}
                <a href="{{ route('projects.index') }}"
                    class="font-semibold transition-colors relative group {{ request()->routeIs('projects.*') ? 'text-[#003E7E]' : 'text-gray-700 hover:text-[#003E7E]' }}">
                    Projects
                    @if (request()->routeIs('projects.*'))
                        <span class="absolute bottom-[-8px] left-0 w-full h-0.5 bg-[#003E7E]"></span>
                    @else
                        <span
                            class="absolute bottom-[-8px] left-0 w-0 h-0.5 bg-[#003E7E] group-hover:w-full transition-all duration-300"></span>
                    @endif
                </a>

                {{-- Our Clients --}}
                <a href="{{ route('clients.index') }}"
                    class="font-semibold transition-colors relative group {{ request()->routeIs('clients.*') ? 'text-[#003E7E]' : 'text-gray-700 hover:text-[#003E7E]' }}">
                    Our Clients
                    @if (request()->routeIs('clients.*'))
                        <span class="absolute bottom-[-8px] left-0 w-full h-0.5 bg-[#003E7E]"></span>
                    @else
                        <span
                            class="absolute bottom-[-8px] left-0 w-0 h-0.5 bg-[#003E7E] group-hover:w-full transition-all duration-300"></span>
                    @endif
                </a>

                {{-- News --}}
                <a href="{{ route('blog.index') }}"
                    class="font-semibold transition-colors relative group {{ request()->routeIs('blog.*') ? 'text-[#003E7E]' : 'text-gray-700 hover:text-[#003E7E]' }}">
                    News
                    @if (request()->routeIs('blog.*'))
                        <span class="absolute bottom-[-8px] left-0 w-full h-0.5 bg-[#003E7E]"></span>
                    @else
                        <span
                            class="absolute bottom-[-8px] left-0 w-0 h-0.5 bg-[#003E7E] group-hover:w-full transition-all duration-300"></span>
                    @endif
                </a>

                {{-- Contact Button --}}
                <a href="{{ route('contact.index') }}"
                    class="px-6 py-2 rounded-lg font-semibold text-white transition transform hover:scale-105 {{ request()->routeIs('contact.*') ? 'bg-[#5FA9DD]' : 'bg-[#003E7E] hover:bg-[#5FA9DD]' }}">
                    Contact Us
                </a>
            </div>

            {{-- Mobile Menu Button --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0" class="md:hidden mt-4 pb-4 space-y-2"
            style="display: none;">

            <a href="{{ route('home') }}"
                class="block py-2 px-4 rounded-lg font-semibold transition {{ request()->routeIs('home') ? 'bg-blue-50 text-[#003E7E]' : 'text-gray-700 hover:bg-gray-50' }}">
                Home
            </a>

            <a href="{{ route('about') }}"
                class="block py-2 px-4 rounded-lg font-semibold transition {{ request()->routeIs('about') ? 'bg-blue-50 text-[#003E7E]' : 'text-gray-700 hover:bg-gray-50' }}">
                About Us
            </a>

            {{-- Mobile Services --}}
            <div x-data="{ servicesOpen: false }">
                <button @click="servicesOpen = !servicesOpen"
                    class="w-full flex items-center justify-between py-2 px-4 rounded-lg font-semibold transition {{ request()->routeIs('services.*') ? 'bg-blue-50 text-[#003E7E]' : 'text-gray-700 hover:bg-gray-50' }}">
                    Services
                    <svg class="w-4 h-4 transition-transform" :class="servicesOpen ? 'rotate-180' : ''" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>

                <div x-show="servicesOpen" x-collapse class="pl-4 space-y-1 mt-1 border-l-2 border-gray-200">
                    <a href="{{ route('services.index') }}"
                        class="block py-2 px-4 rounded-lg text-sm {{ request()->routeIs('services.index') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                        All Services
                    </a>

                    {{-- <a href="{{ route('services.3cx-phone-systems') }}"
                        class="block py-2 px-4 rounded-lg text-sm {{ request()->routeIs('services.3cx-phone-systems') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                        3CX Phone Systems
                    </a>

                    <a href="{{ route('services.lan-wan-solutions') }}"
                        class="block py-2 px-4 rounded-lg text-sm {{ request()->routeIs('services.lan-wan-solutions') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                        LAN & WAN Solutions
                    </a>

                    <a href="{{ route('services.telephone-management') }}"
                        class="block py-2 px-4 rounded-lg text-sm {{ request()->routeIs('services.telephone-management') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                        Telephone Management
                    </a>

                    <a href="{{ route('services.consultancy-services') }}"
                        class="block py-2 px-4 rounded-lg text-sm {{ request()->routeIs('services.consultancy-services') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                        Consultancy Services
                    </a>

                    <a href="{{ route('services.ict-solutions') }}"
                        class="block py-2 px-4 rounded-lg text-sm {{ request()->routeIs('services.ict-solutions') ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                        ICT Solutions
                    </a> --}}

                    @php
                        $navServices = \App\Models\Service::active()->ordered()->limit(5)->get();
                    @endphp

                    @foreach ($navServices as $navService)
                        <a href="{{ route('services.show', $navService->slug) }}"
                            class="block py-2 px-4 rounded-lg text-sm {{ request()->is('services/' . $navService->slug) ? 'text-[#003E7E] bg-blue-50' : 'text-gray-600 hover:bg-gray-50' }}">
                            {{ $navService->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('projects.index') }}"
                class="block py-2 px-4 rounded-lg font-semibold transition {{ request()->routeIs('projects.*') ? 'bg-blue-50 text-[#003E7E]' : 'text-gray-700 hover:bg-gray-50' }}">
                Projects
            </a>

            <a href="{{ route('clients.index') }}"
                class="block py-2 px-4 rounded-lg font-semibold transition {{ request()->routeIs('clients.*') ? 'bg-blue-50 text-[#003E7E]' : 'text-gray-700 hover:bg-gray-50' }}">
                Our Clients
            </a>

            <a href="{{ route('blog.index') }}"
                class="block py-2 px-4 rounded-lg font-semibold transition {{ request()->routeIs('blog.*') ? 'bg-blue-50 text-[#003E7E]' : 'text-gray-700 hover:bg-gray-50' }}">
                News
            </a>

            <a href="{{ route('contact.index') }}"
                class="block py-2 px-4 rounded-lg font-semibold text-white text-center transition {{ request()->routeIs('contact.*') ? 'bg-[#5FA9DD]' : 'bg-[#003E7E]' }}">
                Contact Us
            </a>
        </div>
    </nav>
</header>
