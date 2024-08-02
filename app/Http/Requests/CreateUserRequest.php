<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'isAdmin' => $this->boolean('isAdmin'),
            'isActive' => $this->boolean('isActive'),
        ]);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'country_code' => 'required|string|max:3',
            'group_id' => 'required|exists:groups,ID',
            'isAdmin' => 'boolean',
            'isActive' => 'boolean',
        ];
    }
}

