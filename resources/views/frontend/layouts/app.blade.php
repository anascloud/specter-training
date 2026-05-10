<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ $title }}</title> --}}
    <x-frontend.seo-meta />
    <link rel="stylesheet" href="{{ asset('css/front-end-custom.css') }}">
    @include('layouts.partials.manual-styles')
    @include('layouts.partials.manual-scripts')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col">
    
    @include('frontend.layouts.navbar')

    <main class="flex-grow">
       <div class="pt-22 md:pt-24 pb-12">
         @yield('content')
       </div>
    </main>

    @include('frontend.layouts.footer')

    
    @stack('scripts')
</body>
</html>
