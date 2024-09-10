@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-extrabold text-gray-800 text-center">Your Cart</h2>

        @if($items->isEmpty())
        <p class="text-center mt-6 text-gray-600">Your cart is empty.</p>
        @else
        <div class="mt-8">
            <ul class="space-y-6">
                @foreach($items as $item)
                <li class="flex items-center justify-between p-4 border rounded-lg shadow-sm bg-gray-50">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-24 h-24 object-cover rounded-lg border">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $item->product->name }}</h3>
                            <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-medium focus:outline-none focus:ring-2 focus:ring-red-500">Remove</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>

            <div class="text-center mt-8">
                <form action="{{ route('orders.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-pink-600 text-white py-3 px-6 rounded-lg shadow hover:bg-pink-700 transition duration-300">
                        Proceed to Checkout
                    </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection