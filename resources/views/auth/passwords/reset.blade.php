@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Reset Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input id="password" type="password" name="password" required class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm">
            </div>
            <button type="submit" class="bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-500 w-full">Reset Password</button>
        </form>
    </div>
</div>
@endsection
