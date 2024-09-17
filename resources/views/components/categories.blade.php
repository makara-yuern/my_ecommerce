<div id="categories" class="py-10">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-3xl font-extrabold text-gray-900">Shop by Category</h2>
        <p class="text-gray-600 mt-4 max-w-2xl mx-auto text-lg">
            Explore our wide range of categories to find the perfect fit for your style.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8 mt-8">
            @foreach ($categories as $category)
            <a href="{{ route('products.by-category', ['category' => $category->id]) }}" 
               class="block bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div class="relative w-full h-48 overflow-hidden rounded-lg">
                    <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                </div>
                <h3 class="mt-4 font-bold text-lg text-gray-800">{{ $category->name }}</h3>
            </a>
            @endforeach

            <!-- Inline See More Categories Icon -->
            <a href="{{ route('categories.all') }}" 
               class="flex flex-col items-center justify-center bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                <div class="text-pink-500 text-4xl">
                    <i class="fas fa-th-large"></i>
                </div>
                <h3 class="mt-4 font-semibold text-lg text-pink-500">See All Categories</h3>
            </a>
        </div>
    </div>
</div>
