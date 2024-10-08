<nav class="bg-white shadow-md px-4 py-2 sticky top-0 z-50">
    <div class="flex items-center justify-between h-14">

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-9">
            <!-- Logo -->
            <a href="{{ url('/') }}" aria-label="Homepage">
                <img class="h-10 w-auto rounded-lg border border-gray-200 shadow-lg transition-transform transform hover:scale-105" src="{{ asset('images/cat.jpg') }}" alt="Company Logo">
            </a>
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-pink-600 transition-colors text-lg font-medium" aria-label="Home">Home</a>
            <a href="{{ url('/shop') }}" class="text-gray-700 hover:text-pink-600 transition-colors text-lg font-medium" aria-label="Shop">Shop</a>
            <a href="{{ url('/about') }}" class="text-gray-700 hover:text-pink-600 transition-colors text-lg font-medium" aria-label="About Us">About</a>
            <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-pink-600 transition-colors text-lg font-medium" aria-label="Contact Us">Contact</a>
        </div>

        <!-- Search Bar -->
        <div class="hidden md:flex flex-grow justify-center relative">
            <form action="{{ route('search') }}" method="GET" class="relative w-full max-w-xl">
                <div class="flex">
                    <input type="text" name="query" id="search-input" placeholder="Search products..." class="px-4 py-2 border border-gray-300 rounded-l-md w-full focus:outline-none focus:ring-2 focus:ring-pink-500 pr-16" autocomplete="off">
                    <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-r-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500" aria-label="Search">Search</button>
                </div>
                <div id="suggestions" class="absolute left-0 right-0 top-full bg-white border border-gray-300 mt-1 rounded-md shadow-lg z-10 hidden"></div>
            </form>
        </div>

        @php
            $cartCount = (new \App\Http\Controllers\CartController())->getCartCount();
        @endphp
        <!-- View Cart -->
        <div class="relative md:flex items-center mr-8 space-x-4 hidden">
            <a href="{{ route('cart.index') }}" class="text-gray-700 hover:text-pink-600 transition-colors flex items-center space-x-2" aria-label="View Cart">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.5 2h11l.5-2h2m-1 10H7m10 0H7m4 4h6v-2H11m-8 0h8M4 6h16l-2 12H6L4 6z"></path>
                </svg>
                <span>Cart</span>
                <span id="cart-count" class="ml-2 bg-red-500 text-white rounded-full px-2 text-xs">{{ auth()->check() ? $cartCount : 0 }}</span>
            </a>
        </div>

        <!-- User Login / Profile -->
        <div class="relative md:flex items-center space-x-4 hidden">
            @guest
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-600 transition-colors" aria-label="Login">Login</a>
            <a href="{{ route('register') }}" class="text-gray-700 hover:text-pink-600 transition-colors" aria-label="Register">Register</a>
            @else
            <div class="relative">
                <button id="user-menu-button" class="text-gray-700 hover:text-pink-600 transition-colors flex items-center space-x-2" aria-label="User Menu">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden z-20 hidden">
                    <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" aria-label="Profile">Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-label="Logout">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            @endguest
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button id="mobile-menu-button" class="text-gray-700 hover:text-pink-600 focus:outline-none" aria-label="Toggle Mobile Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden absolute top-14 left-0 w-full bg-white shadow-md hidden">
        <div class="flex flex-col p-4">
            <a href="{{ url('/') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="Home">Home</a>
            <a href="{{ url('/shop') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="Shop">Shop</a>
            <a href="{{ url('/about') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="About Us">About</a>
            <a href="{{ url('/contact') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="Contact Us">Contact</a>
            @guest
            <a href="{{ route('login') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="Login">Login</a>
            <a href="{{ route('register') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="Register">Register</a>
            @else
            <a href="{{ route('profile.show') }}" class="py-2 text-gray-700 hover:text-pink-600 text-lg" aria-label="Profile">Profile</a>
            <a href="#" class="py-2 text-gray-700 hover:text-pink-600 text-lg" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-label="Logout">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endguest
        </div>
    </div>
</nav>