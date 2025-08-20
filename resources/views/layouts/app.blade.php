<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($title) ? "$title | Deinsu WMS" : 'Deinsu WMS' }}</title>

    {{-- icon --}}
    <link rel="icon" href="{{ asset('images/deinsu_rbg.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <div class="bg-gray-50 dark:bg-gray-900">

        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <main class="p-4 md:ml-64 h-auto pt-20">
            @yield('content')
        </main>
    </div>
</body>

</html>
