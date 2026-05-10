<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Dashboard' }} | HBD Services</title>

    @include('layouts.partials.manual-styles')
    @include('layouts.partials.manual-scripts')
    <link rel="stylesheet" href="{{ asset('css/back-end-custom.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Theme + Sidebar Store -->
    <script>
        document.addEventListener('alpine:init', () => {

            Alpine.store('theme', {
                theme: 'light',

                init() {
                    const savedTheme = localStorage.getItem('theme');
                    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches
                        ? 'dark'
                        : 'light';

                    this.theme = savedTheme || systemTheme;
                    this.updateTheme();
                },

                toggle() {
                    this.theme = this.theme === 'light' ? 'dark' : 'light';
                    localStorage.setItem('theme', this.theme);
                    this.updateTheme();
                },

                updateTheme() {
                    if (this.theme === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                }
            });


            Alpine.store('sidebar', {
                isExpanded: window.innerWidth >= 1280,
                isMobileOpen: false,
                isHovered: false,

                toggleExpanded() {
                    this.isExpanded = !this.isExpanded;
                },

                toggleMobileOpen() {
                    this.isMobileOpen = !this.isMobileOpen;
                },

                setMobileOpen(val) {
                    this.isMobileOpen = val;
                },

                setHovered(val) {
                    if (window.innerWidth >= 1280 && !this.isExpanded) {
                        this.isHovered = val;
                    }
                }
            });

        });
    </script>

</head>

<body x-data="{ loaded: true }">

    <x-preloader/>

    <div class="min-h-screen xl:flex overflow-hidden">

        @include('backend.layouts.backdrop')
        @include('backend.layouts.sidebar')

        <div :class="[
  'flex-1',
  $store.sidebar.isExpanded ? 'ml-fifteen' : 'ml-four'
]">
            @include('backend.layouts.app-header')

            <div class="p-4 mx-auto md:p-6">
                @yield('content')
            </div>
        </div>

    </div>

    @stack('scripts')

</body>
</html>
