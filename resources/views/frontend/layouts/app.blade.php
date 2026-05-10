<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $title }}</title> --}}
    <x-frontend.seo-meta />
    <link rel="stylesheet" href="{{ asset('css/front-end-custom.css') }}">
     {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
     <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
     <!-- Public Sans Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<!-- PrismJS CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.30.0/themes/prism.min.css">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Tailwind CSS (browser/CDN version) -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
</head>
<body class="min-h-screen flex flex-col">
    
    @include('frontend.layouts.navbar')

    <main class="flex-grow">
       <div class="pt-22 md:pt-24 pb-12">
         @yield('content')
       </div>
    </main>

    @include('frontend.layouts.footer')

    

    <!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!-- Swiper (includes Navigation, Pagination, Autoplay modules) -->

<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

<!-- Flatpickr -->

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- FullCalendar -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js"></script>
<script>
  
document.addEventListener('DOMContentLoaded', function () {

    if (document.querySelector('.student-stories-swiper')) {

        new Swiper('.student-stories-swiper', {
            loop: true,
            speed: 600,
            spaceBetween: 16,
            grabCursor: true,

            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },

            pagination: {
                el: '.student-stories-swiper .swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.student-stories-swiper .swiper-button-next',
                prevEl: '.student-stories-swiper .swiper-button-prev',
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 14,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 18,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                }
            }
        });

    }

});
</script>

    @stack('scripts')
</body>
</html>
