@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex flex-col lg:flex-row items-center lg:items-start">
            <!-- Main Product Image -->
            <div class="lg:w-1/3">
                <div class="mb-6 relative overflow-hidden">
                    <img id="main-product-image" src="{{ $product->image }}" alt="{{ $product->name }}" 
                         class="w-full h-96 object-contain rounded-md shadow-md mx-auto transition-transform 
                                duration-300 ease-in-out transform hover:scale-110 cursor-pointer" />
                </div>

                <!-- Variant Images -->
                <div class="mt-6 lg:ml-24">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Select a Variant:</h3>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($product->variants as $variant)
                        <div class="product variant-option relative group" data-type="variant" data-id="{{ $variant->id }}" 
                             data-price="{{ $variant->price }}" data-stock="{{ $variant->stock }}" 
                             data-name="{{ $variant->variant_name }}" data-color="{{ $variant->variant_color }}"
                             data-description="{{ $variant->description }}">
                            <img src="{{ $variant->image }}" alt="{{ $variant->variant_name }}" 
                                 class="w-20 h-20 object-contain rounded-md shadow-md cursor-pointer 
                                        border-2 border-transparent hover:border-pink-500 transition 
                                        transform hover:scale-105" />
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 
                                        transition-opacity bg-black bg-opacity-50 rounded-md">
                                <p class="text-white text-xs font-semibold">{{ $variant->variant_name }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="lg:ml-8 mt-6 lg:mt-0 lg:w-2/3">
                <h1 id="product-name" class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p id="product-description" class="mt-4 text-gray-600">{{ $product->description }}</p>
                <p id="product-price" class="mt-6 text-pink-600 font-semibold text-xl">{{ number_format($product->price, 2) }} USD</p>

                <!-- Stock Badge -->
                <div class="mt-6">
                    <span id="product-stock" class="inline-block {{ $product->stock > 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} text-sm px-4 py-1 rounded-full">
                        {{ $product->stock > 0 ? "In Stock ({$product->stock} available)" : 'Out of Stock' }}
                    </span>
                </div>

                <!-- Quantity Selector -->
                <div class="mt-6 flex items-center space-x-4">
                    <label for="quantity" class="text-gray-700">Quantity:</label>
                    <input id="quantity" type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" 
                           class="w-16 border border-gray-300 rounded-lg text-center py-1">
                </div>

                <!-- Add to Cart Button -->
                <div class="mt-6">
                    <button id="add-to-cart-button" 
                            class="mt-4 bg-pink-500 text-white w-1/5 py-2 px-4 rounded-lg hover:bg-pink-600 
                                   focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50 
                                   transition duration-200"
                            data-product-id="{{ $product->id }}">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    let mainImageElement = document.getElementById('main-product-image');
    let currentMainImageSrc = mainImageElement.src;
    let currentMainType = 'product';
    let currentMainId = mainImageElement.parentElement.getAttribute('data-id');

    document.querySelectorAll('.variant-option').forEach(function(variant) {
        variant.addEventListener('click', function() {
            const clickedType = this.getAttribute('data-type');
            const clickedId = this.getAttribute('data-id');
            const clickedImageUrl = this.querySelector('img').getAttribute('src');
            const description = this.getAttribute('data-description');

            if (clickedId !== currentMainId) {
                this.querySelector('img').setAttribute('src', currentMainImageSrc);
                mainImageElement.setAttribute('src', clickedImageUrl);

                this.setAttribute('data-id', currentMainId);
                this.setAttribute('data-type', currentMainType);
                mainImageElement.parentElement.setAttribute('data-id', clickedId);
                mainImageElement.parentElement.setAttribute('data-type', clickedType);

                if (clickedType === 'variant') {
                    const price = this.getAttribute('data-price');
                    const stock = this.getAttribute('data-stock');
                    const name = this.getAttribute('data-name');
                    const color = this.getAttribute('data-color');

                    document.getElementById('product-name').innerText = name + ' (' + color + ')';
                    document.getElementById('product-price').innerText = parseFloat(price).toFixed(2) + ' USD';
                    document.getElementById('product-stock').innerText = stock > 0 ? `In Stock (${stock} available)` : 'Out of Stock';
                    document.getElementById('product-description').innerText = description;
                    document.getElementById('quantity').max = stock;

                    currentMainType = 'variant';
                } else {
                    document.getElementById('product-name').innerText = "{{ $product->name }}";
                    document.getElementById('product-price').innerText = "{{ number_format($product->price, 2) }} USD";
                    document.getElementById('product-stock').innerText = "{{ $product->stock > 0 ? 'In Stock (' . $product->stock . ' available)' : 'Out of Stock' }}";
                    document.getElementById('product-description').innerText = "{{ $product->description }}";
                    document.getElementById('quantity').max = "{{ $product->stock }}";

                    currentMainType = 'product';
                }

                currentMainImageSrc = clickedImageUrl;
                currentMainId = clickedId;
            }
        });
    });
});
</script>
@endsection
