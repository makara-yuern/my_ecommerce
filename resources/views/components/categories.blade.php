@php
    $categories = $categories ?? collect();
    $categoriesCount = $categories->count();
@endphp

<div id="categories" class="py-12">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl font-bold">Shop by Category</h2>
        <div id="categories-container" class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            @foreach ($categories as $category) <!-- Corrected line -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <img src="{{ $category->image ?: 'https://via.placeholder.com/150' }}" alt="{{ $category->name }}" class="w-full h-48 object-cover rounded">
                <h3 class="mt-4 font-bold text-lg">{{ $category->name }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>
