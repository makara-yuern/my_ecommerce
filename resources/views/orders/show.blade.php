@extends('layouts.app')

@section('title', 'Order Details')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">Order Details</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Order Summary -->
            <h3 class="text-xl font-bold mb-4">Order Summary</h3>
            <p class="text-gray-700">Order ID: <span class="font-semibold">{{ $order->id }}</span></p>
            <p class="text-gray-700">Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span></p>
            <p class="text-gray-700">Total Amount: <span class="font-semibold">${{ number_format($order->total_amount, 2) }}</span></p>

            <!-- Order Items -->
            <div class="mt-8">
                <h3 class="text-lg font-bold mb-4">Items in your order</h3>
                <ul class="space-y-4">
                    @foreach($order->items as $item)
                        <li class="flex justify-between items-center border-b border-gray-200 pb-4">
                            <div class="flex items-center space-x-4">
                                <!-- Product Image -->
                                <img src="{{ $item->product->image }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover rounded-lg shadow-md">
                                
                                <div>
                                    <!-- Product Name and Details -->
                                    <h3 class="font-bold text-gray-800">{{ $item->product->name }}</h3>
                                    <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                                    <p class="text-gray-600">Price: ${{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                            <!-- Total Price for the Item -->
                            <div class="text-right">
                                <p class="text-gray-900 font-semibold">
                                    ${{ number_format($item->price * $item->quantity, 2) }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Payment Section -->
            <div class="mt-12">
                <h3 class="text-lg font-bold mb-4">Payment Process</h3>
                <p class="text-gray-700 mb-4">Choose a payment method to complete your order.</p>

                <!-- Payment Form -->
                <form action="{{ route('orders.payment', $order->id) }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="payment_method" class="block font-medium text-gray-700">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                            <option value="stripe">Credit/Debit Card (Stripe)</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>

                    <!-- Payment Button -->
                    <button type="submit" class="bg-pink-600 text-white py-3 px-6 rounded-lg shadow hover:bg-pink-700 transition duration-300 w-full">
                        Proceed to Payment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
