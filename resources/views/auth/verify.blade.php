@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Email Verification</h2>
        <p class="text-center text-gray-600 mb-4">Before proceeding, please check your email for a verification link.</p>
        @if (session('resent'))
            <div class="mb-4 text-green-600 text-sm">
                A fresh verification link has been sent to your email address.
            </div>
        @endif
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="bg-pink-600 text-white py-2 px-4 rounded-lg hover:bg-pink-500 w-full">Resend Verification Email</button>
        </form>
    </div>
</div>
@endsection
