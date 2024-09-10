<div id="new-arrivals" class="py-12">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold">New Arrivals</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-8">
            @foreach($newArrivals as $product)
            <div class="product bg-white rounded-lg shadow-md p-6 relative" data-id="{{ $product->id }}">
                <a href="{{ route('product.show', $product->id) }}" class="block relative">
                    <span class="absolute top-2 left-2 bg-pink-500 text-white text-xs font-bold py-1 px-2 rounded">New</span>
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                    <h3 class="mt-4 font-bold text-lg">{{ $product->name }}</h3>
                    <p class="mt-2 text-pink-600 font-semibold">{{ $product->price }}</p>
                </a>
                <button
                    class="add-to-cart mt-4 bg-pink-500 text-white w-full py-2 px-4 rounded-lg hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-opacity-50 transition-colors duration-200"
                    data-product-id="{{ $product->id }}"
                    data-quantity="1">
                    Add to Cart
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>
