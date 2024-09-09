@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold">Search Results for "{{ $query }}"</h1>

        @if($products->count())
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                        <h3 class="mt-4 font-bold text-lg">{{ $product->name }}</h3>
                        <p class="mt-2 text-pink-600 font-semibold">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="block mt-4 bg-pink-500 text-white py-2 rounded-lg text-center">View Details</a>
                    </div>
                @endforeach
            </div>

        @else
            <p class="mt-4 text-gray-700">No products found for your query.</p>
        @endif
    </div>
@endsection
