<div id="featured-products" class="py-10">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold">Featured Products</h2>
        <p class="mt-2 text-lg text-gray-600">Check out some of our top picks just for you</p>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">
            @foreach($featuredProducts as $product)
            <div class="product bg-white rounded-lg shadow-md p-6" data-id="{{ $product->id }}">
                <a href="{{ route('product.show', $product->id) }}" class="relative block overflow-hidden">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full max-w-sm max-h-60 mx-auto object-cover rounded transition-transform duration-300 ease-in-out hover:scale-110">
                    <h3 class="mt-4 font-bold text-lg">{{ $product->name }}</h3>
                    <p class="mt-2 text-pink-600 font-semibold">{{ $product->price }}</p>
                </a>
                <button
                    class="add-to-cart-button mt-4 bg-pink-500 text-white w-full py-2 px-4 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50 transition-colors duration-200"
                    data-product-id="{{ $product->id }}"
                    data-quantity="1">
                    Add to Cart
                </button>
            </div>
            @endforeach
        </div>
        <div id="load-more-container" class="mt-4 text-center">
            <button id="load-more" class="bg-pink-500 text-white py-2 px-4 rounded-lg">Load More</button>
        </div>
    </div>
</div>
