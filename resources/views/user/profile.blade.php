@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Profile Update Form -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-medium text-gray-900">Edit Profile</h2>

            <p class="mt-1 text-sm text-gray-600">Update your account's profile information</p>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-5">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                           class="w-full p-3 border rounded-lg @error('name') border-red-500 @enderror">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                           class="w-full p-3 border rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 font-semibold">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                           class="w-full p-3 border rounded-lg">
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-gray-700 font-semibold">Location</label>
                    <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                           class="w-full p-3 border rounded-lg">
                </div>

                <!-- Avatar -->
                <div class="mb-4">
                    <label for="avatar" class="block text-gray-700 font-semibold">Profile Picture</label>
                    <input type="file" name="avatar" id="avatar" class="w-full p-3 border rounded-lg">
                    @error('avatar')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Save Changes Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-3 rounded-lg 
                                               hover:bg-blue-600 focus:outline-none focus:ring-2 
                                               focus:ring-blue-500 transition duration-200">
                        Save Profile
                    </button>
                </div>
            </form>
        </div>

        <!-- Password Update Form -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Update Password</h2>

            <!-- Success Message for Password Update -->
            @if (session('password_success'))
                <div class="bg-green-500 text-white text-center p-3 rounded-lg mb-6">
                    {{ session('password_success') }}
                </div>
            @endif

            <form action="{{ route('profile.update.password') }}" method="POST">
                @csrf

                <!-- Current Password -->
                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700 font-semibold">Current Password</label>
                    <input type="password" name="current_password" id="current_password"
                           class="w-full p-3 border rounded-lg @error('current_password') border-red-500 @enderror">
                    @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 font-semibold">New Password</label>
                    <input type="password" name="new_password" id="new_password"
                           class="w-full p-3 border rounded-lg @error('new_password') border-red-500 @enderror">
                    @error('new_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm New Password -->
                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-gray-700 font-semibold">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                           class="w-full p-3 border rounded-lg @error('new_password_confirmation') border-red-500 @enderror">
                    @error('new_password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Update Password Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-green-500 text-white px-4 py-3 rounded-lg 
                                               hover:bg-green-600 focus:outline-none focus:ring-2 
                                               focus:ring-green-500 transition duration-200">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
