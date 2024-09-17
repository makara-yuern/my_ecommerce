@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- User Profile Card -->
        <div class="bg-white shadow-md rounded-lg p-6 max-w-lg mx-auto">
            <!-- Profile Header -->
            <div class="flex items-center mb-6">
                <img src="{{ Auth::user()->avatar_image }}" alt="User Avatar" 
                     class="h-20 w-20 rounded-full border-2 border-gray-200 object-cover">
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-900">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="mt-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Personal Information</h3>
                <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                    <p class="text-gray-700"><span class="font-semibold">Full Name:</span> {{ Auth::user()->name }}</p>
                    <p class="text-gray-700 mt-2"><span class="font-semibold">Email:</span> {{ Auth::user()->email }}</p>
                    <p class="text-gray-700 mt-2"><span class="font-semibold">Phone Number:</span> {{ Auth::user()->phone ?? 'Not provided' }}</p>
                    <p class="text-gray-700 mt-2"><span class="font-semibold">Location:</span> {{ Auth::user()->address ?? 'Not provided' }}</p>
                </div>
            </div>

            <!-- Edit Profile Button -->
            <div class="mt-6">
                <a href="#" class="block w-full text-center bg-blue-500 text-white px-4 py-2 rounded-lg 
                                  hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 
                                  transition duration-200">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
@endsection
