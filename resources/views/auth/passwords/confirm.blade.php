@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <div class="text-2xl font-bold text-center mb-6">{{ __('Confirm Password') }}</div>

        <div class="mb-6 text-center">
            {{ __('Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                <input id="password" type="password" class="mt-1 p-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500 sm:text-sm @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="text-red-500 text-sm" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-500">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                <a class="text-sm text-pink-600 hover:text-pink-500" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection