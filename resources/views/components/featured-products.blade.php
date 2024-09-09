<div id="featured-products" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold">Featured Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">
            @foreach($featuredProducts as $product)
            <div class="product bg-white rounded-lg shadow-md p-6" data-id="{{ $product->id }}">
                <a href="{{ route('product.show', $product->id) }}">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                    <h3 class="mt-4 font-bold text-lg">{{ $product->name }}</h3>
                    <p class="mt-2 text-pink-600 font-semibold">{{ $product->price }}</p>
                </a>
                <a href="#" class="block mt-4 bg-pink-500 text-white py-2 rounded-lg">Add to Cart</a>
            </div>
            @endforeach
        </div>
        <div id="load-more-container" class="mt-4 text-center">
            <button id="load-more" class="bg-pink-500 text-white py-2 px-4 rounded-lg">Load More</button>
        </div>
    </div>
</div>