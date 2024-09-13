@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex flex-col lg:flex-row items-center lg:items-start">
            <!-- Main Product Image -->
            <div class="lg:w-1/3">
                <div class="mb-6">
                    <img id="main-product-image" src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full max-w-xs max-h-96 mx-auto object-contain rounded-md shadow-md">
                </div>

                <!-- Variant Images (Flexbox) -->
                <div class="mt-6 lg:ml-24"> <!-- Increased margin -->
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Select a Variant:</h3>
                    <div class="flex flex-wrap gap-4">
                        <!-- Variant Images -->
                        @foreach ($product->variants as $variant)
                        <div class="variant-option relative group" data-type="variant" data-id="{{ $variant->id }}" data-price="{{ $variant->price }}" data-stock="{{ $variant->stock }}" data-name="{{ $variant->variant_name }}" data-color="{{ $variant->variant_color }}">
                            <img src="{{ $variant->image }}" alt="{{ $variant->variant_name }}" class="w-20 h-20 object-contain rounded-md shadow-md cursor-pointer border-2 border-transparent hover:border-pink-500 transition transform group-hover:scale-105">
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-black bg-opacity-50 rounded-md">
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
                <div class="mt-4">
                    <span id="product-stock" class="inline-block {{ $product->stock > 0 ? 'bg-green-100 text-green-600' : 'bg-red-100 text-red-600' }} text-sm px-4 py-1 rounded-full">
                        {{ $product->stock > 0 ? "In Stock ({$product->stock} available)" : 'Out of Stock' }}
                    </span>
                </div>

                <!-- Quantity Selector -->
                <div class="mt-6 flex items-center space-x-4">
                    <label for="quantity" class="text-gray-700">Quantity:</label>
                    <input id="quantity" type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-16 border border-gray-300 rounded-lg text-center py-1">
                </div>

                <!-- Add to Cart Button -->
                <div class="mt-8">
                    <button
                        id="add-to-cart-button"
                        class="add-to-cart-button mt-4 bg-pink-500 text-white w-full py-2 px-4 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50 transition duration-200"
                        data-product-id="{{ $product->id }}">
                        Add to Cart
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle product and variant selection
    document.addEventListener('DOMContentLoaded', function() {
        let mainImageElement = document.getElementById('main-product-image');
        let currentMainImageSrc = mainImageElement.src;
        let currentMainType = 'product';
        let currentMainId = mainImageElement.parentElement.getAttribute('data-id');

        // Handle click on product or variant images
        document.querySelectorAll('.variant-option').forEach(function(variant) {
            variant.addEventListener('click', function() {
                const clickedType = this.getAttribute('data-type');
                const clickedId = this.getAttribute('data-id');
                const clickedImageUrl = this.querySelector('img').getAttribute('src'); // Get clicked image URL

                // If the clicked image is not the current main image
                if (clickedId !== currentMainId) {
                    // Swap the images
                    this.querySelector('img').setAttribute('src', currentMainImageSrc); // Set the clicked image's src to the current main image
                    mainImageElement.setAttribute('src', clickedImageUrl); // Set the main image's src to the clicked image

                    // Swap the data attributes
                    this.setAttribute('data-id', currentMainId);
                    this.setAttribute('data-type', currentMainType);
                    mainImageElement.parentElement.setAttribute('data-id', clickedId);
                    mainImageElement.parentElement.setAttribute('data-type', clickedType);

                    // If clicked is variant, update the product details
                    if (clickedType === 'variant') {
                        const price = this.getAttribute('data-price');
                        const stock = this.getAttribute('data-stock');
                        const name = this.getAttribute('data-name');
                        const color = this.getAttribute('data-color');

                        // Update product details
                        document.getElementById('product-name').innerText = name + ' (' + color + ')';
                        document.getElementById('product-price').innerText = parseFloat(price).toFixed(2) + ' USD';
                        document.getElementById('product-stock').innerText = stock > 0 ? `In Stock (${stock} available)` : 'Out of Stock';
                        document.getElementById('quantity').max = stock;

                        currentMainType = 'variant';
                    } else {
                        // Reset to main product details
                        document.getElementById('product-name').innerText = "{{ $product->name }}";
                        document.getElementById('product-price').innerText = "{{ number_format($product->price, 2) }} USD";
                        document.getElementById('product-stock').innerText = "{{ $product->stock > 0 ? 'In Stock (' . $product->stock . ' available)' : 'Out of Stock' }}";
                        document.getElementById('quantity').max = "{{ $product->stock }}";

                        currentMainType = 'product';
                    }

                    // Update the current main image data
                    currentMainImageSrc = clickedImageUrl;
                    currentMainId = clickedId;
                }
            });
        });

        // Handle Add to Cart
        document.getElementById('add-to-cart-button').addEventListener('click', function() {
            const quantity = document.getElementById('quantity').value;
            const productId = currentMainId;
            const url = currentMainType === 'product' ? '/cart/add/' + productId : '/cart/add-variant/' + productId;

            // Make a request to add to cart
            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: quantity
                    })
                }).then(response => response.json())
                .then(data => {
                    alert(data.message);
                }).catch(error => {
                    console.error('Error adding to cart:', error);
                });
        });
    });
</script>
@endsection