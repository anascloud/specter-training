<header class="fixed top-0 left-0 w-full z-50 border-b bg-white/95 backdrop-blur-md border-slate-200 shadow-sm">

    <nav class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="flex justify-between items-center h-18 md:h-20">
            <!-- Mobile Menu Button -->
            <button id="menuBtn" class="sm:hidden">

                <!-- Hamburger -->
                <svg id="menuOpenIcon" class="w-7 h-7 text-slate-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>

                <!-- Close -->
                <svg id="menuCloseIcon" class="hidden w-7 h-7 text-slate-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>

            </button>
            <!-- Logo -->
            <div class="text-lg md:text-xl lg:text-xl font-bold tracking-tight text-slate-900 uppercase">
                Specter Training
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex items-center gap-4 md:gap-6 lg:gap-8 text-sm lg:text-base">

                {{-- Home --}}
                <a href="{{ route('home') }}"
                    class="relative font-normal transition-all duration-300
        {{ request()->routeIs('home') ? 'text-teal-600 font-normal after:w-full' : 'text-slate-700 hover:text-teal-600 after:w-0 hover:after:w-full' }}
        after:absolute after:left-0 after:bottom-[-6px]
        after:h-[2px] after:bg-teal-600 after:transition-all after:duration-300">

                    Home
                </a>


                {{-- Qualifications --}}
                <a href="{{ route('qualifications') }}"
                    class="relative font-normal transition-all duration-300
        {{ request()->routeIs('qualifications') ? 'text-teal-600 font-normal after:w-full' : 'text-slate-700 hover:text-teal-600 after:w-0 hover:after:w-full' }}
        after:absolute after:left-0 after:bottom-[-6px]
        after:h-[2px] after:bg-teal-600 after:transition-all after:duration-300">

                    Qualifications
                </a>


                {{-- About --}}
                <a href="{{ route('about') }}"
                    class="relative font-normal transition-all duration-300
        {{ request()->routeIs('about') ? 'text-teal-600 font-normal after:w-full' : 'text-slate-700 hover:text-teal-600 after:w-0 hover:after:w-full' }}
        after:absolute after:left-0 after:bottom-[-6px]
        after:h-[2px] after:bg-teal-600 after:transition-all after:duration-300">

                    About
                </a>


                {{-- Contact --}}
                <a href="{{ route('contact') }}"
                    class="relative font-normal transition-all duration-300
        {{ request()->routeIs('contact') ? 'text-teal-600 font-normal after:w-full' : 'text-slate-700 hover:text-teal-600 after:w-0 hover:after:w-full' }}
        after:absolute after:left-0 after:bottom-[-6px]
        after:h-[2px] after:bg-teal-600 after:transition-all after:duration-300">

                    Contact
                </a>

            </div>

            <!-- Right Side -->
            <button
                class=" text-sm lg:text-base  bg-teal-600 text-white px-4 py-2 lg:px-6 lg:py-2.5 rounded-lg font-normal hover:bg-teal-700 transition">
                Apply Now
            </button>

        </div>

    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden sm:hidden bg-white border-t border-slate-200 shadow-lg">

        <div class="flex flex-col px-6 py-5 space-y-3 text-base">
            <a href="{{ route('home') }}"
                class="{{ request()->routeIs('home') ? 'text-teal-600 font-medium' : 'text-slate-700' }}">Home</a>
            <a href="{{ route('qualifications') }}"
                class="{{ request()->routeIs('qualifications') ? 'text-teal-600 font-medium' : 'text-slate-700' }}">Qualifications</a>
            <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'text-teal-600 font-medium' : 'text-slate-700' }}">About</a>
            <a href="{{ route('contact') }}"
                class="{{ request()->routeIs('contact') ? 'text-teal-600 font-medium' : 'text-slate-700' }}">Contact</a>
            <button class="bg-teal-600 text-white py-3 rounded-lg font-normal">
                Apply Now
            </button>
        </div>
    </div>
</header>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    const openIcon = document.getElementById('menuOpenIcon');
    const closeIcon = document.getElementById('menuCloseIcon');

    menuBtn.addEventListener('click', () => {

        mobileMenu.classList.toggle('hidden');

        if (mobileMenu.classList.contains('hidden')) {
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        } else {
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        }

    });
</script>
