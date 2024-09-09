@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex flex-col lg:flex-row items-center lg:items-start">
            <!-- Product Image -->
            <div class="lg:w-1/3">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-md shadow-md">
            </div>

            <!-- Product Details -->
            <div class="lg:ml-8 mt-6 lg:mt-0 lg:w-2/3">
                <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p class="mt-4 text-gray-600">{{ $product->description }}</p>
                <p class="mt-6 text-pink-600 font-semibold text-xl">{{ $product->price }} USD</p>

                <!-- Quantity Selector -->
                <div class="mt-6 flex items-center space-x-4">
                    <label for="quantity" class="text-gray-700">Quantity:</label>
                    <input id="quantity" type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-16 border border-gray-300 rounded-lg text-center py-1">
                </div>

                <!-- Stock Info -->
                <p class="mt-2 text-sm text-gray-500">
                    @if($product->stock > 0)
                        In Stock ({{ $product->stock }} available)
                    @else
                        <span class="text-red-500">Out of Stock</span>
                    @endif
                </p>

                <!-- Add to Cart Button -->
                <div class="mt-8">
                    <button id="add-to-cart-btn" class="w-auto p-2 lg:w-auto bg-pink-500 hover:bg-pink-600 text-white py-2 px-6 rounded-lg shadow-md transition-colors duration-200 flex items-center justify-center space-x-2">
                        <span>Add to Cart</span>
                    </button>
                    <span id="cart-success-message" class="hidden mt-4 text-green-600 font-semibold">Item added to cart successfully!</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection