<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    // Display the user's profile
    public function show()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('user.profile', compact('user'));
    }

    // Display the form for editing the user's profile
    public function edit()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('user.edit-profile', compact('user'));
    }

    // Update the user's profile information
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle avatar upload if present
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar_image = $avatarPath;
        }

        // Update user profile details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        // Validate the password inputs
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Check if current password matches
        if (!Hash::check($request->input('current_password'), Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        // Update the password
        Auth::user()->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }
}
