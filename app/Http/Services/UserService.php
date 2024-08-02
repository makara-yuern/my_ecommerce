<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $validatedData)
    {
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->country_code = $validatedData['country_code'];
        $user->is_admin = $validatedData['isAdmin'] ?? false;
        $user->status = $validatedData['isActive'] ?? false;

        $user->save();

        // Attach user to group
        $user->groups()->attach($validatedData['group_id']);

        return $user;
    }

    public function updateUser(array $data, $userId)
    {
        $user = User::findOrFail($userId);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->country_code = $data['country_code'];
        $user->is_admin = $data['isAdmin'] ?? false;
        $user->status = $data['isActive'] ?? false;

        // Detach current groups
        $user->groups()->detach();

        $user->save();
    }
}
