@extends('layouts.app')

@section('content')
<div id="all-categories" class="py-10">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-3xl font-bold">All Categories</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-8">
            @foreach ($categories as $category)
            <a href="{{ route('products.by-category', ['category' => $category->id]) }}" class="block bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 ease-in-out">
                <img src="{{ $category->image ?: 'https://via.placeholder.com/150' }}" alt="{{ $category->name }}" class="w-full h-48 object-cover rounded">
                <h3 class="mt-4 font-bold text-lg">{{ $category->name }}</h3>
            </a>
            @endforeach
        </div>

        <!-- Pagination Links -->
        <div class="mt-8">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
