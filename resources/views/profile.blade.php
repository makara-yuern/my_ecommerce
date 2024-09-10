@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">User Profile</h1>
        <!-- Profile content goes here -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- User information can be displayed here -->
            <div class="flex items-center mb-4">
                <img src="{{ Auth::user()->avatar_image }}" alt="User Avatar" class="h-16 w-16 rounded-full border-2 border-gray-200 mr-4">
                <div>
                    <h2 class="text-2xl font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <div class="mt-6">
                <a href="#" class="text-blue-500 hover:text-blue-700">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
