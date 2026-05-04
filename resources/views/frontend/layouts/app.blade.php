<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">
    
    @include('frontend.layouts.navbar')

    <main class="flex-grow">
       <div class="pt-24 pb-12">
         @yield('content')
       </div>
    </main>

    @include('frontend.layouts.footer')

</body>
</html>