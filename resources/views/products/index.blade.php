@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-2xl font-bold">Products {{ $category->name }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">
            @forelse ($products as $product)
            <div class="product bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 ease-in-out">
                <a href="{{ route('product.show', $product->id) }}" class="relative block overflow-hidden">
                    <img src="{{ $product->image ?: 'https://via.placeholder.com/150' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-lg">
                    <h3 class="mt-4 font-bold text-lg">{{ $product->name }}</h3>
                    <p class="mt-2 text-gray-700">${{ number_format($product->price, 2) }} USD</p>
                    <a href="{{ route('product.show', ['id' => $product->id]) }}" class="inline-block mt-4 bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition transform hover:scale-105">
                        View Details
                    </a>
                </a>
            </div>
            @empty
            <p class="text-center text-gray-500">No products found in this category.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection