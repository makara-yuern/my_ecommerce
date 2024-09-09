<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My eCommerce Store')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <x-navbar />

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />
</body>
</html>
