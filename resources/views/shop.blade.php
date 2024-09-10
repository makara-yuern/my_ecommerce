@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Shop</h1>
        
        <!-- Shop content goes here -->
        <p class="text-lg text-gray-700 mb-4">
            Explore our range of products and find what you're looking for. From the latest trends to timeless classics, we have something for everyone.
        </p>
        
        <!-- Example Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Example Product Card -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                <img src="https://via.placeholder.com/150" alt="Product Image" class="w-full h-32 object-cover mb-4 rounded-md">
                <h2 class="text-xl font-semibold mb-2">Product Name</h2>
                <p class="text-gray-600 mb-2">Product description goes here. Brief details about the product features and benefits.</p>
                <span class="text-lg font-bold text-pink-600">$49.99</span>
            </div>
            <!-- Repeat Product Card as needed -->
        </div>
    </div>
@endsection
