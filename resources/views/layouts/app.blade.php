<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My eCommerce Store')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/cart.js')
    @vite('resources/js/page.js')
    @vite('resources/js/search.js')
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <x-navbar />

    <!-- Alert messages -->
    <div class="container mx-auto px-4 mt-6">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />
</body>
</html>
