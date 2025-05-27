<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    public function authorize(): bool // Method to authorize the request
    {
        return true; // Allow all users to make this request
    }

    public function rules(): array // Method to define validation rules
    {
        return [
            'username' => 'required|string', // Username is required and must be a string
            'password' => 'required|string', // Password is required and must be a string
        ];
    }

    public function messages(): array // Method to define custom validation messages
    {
        return [
            'username.required' => 'Please enter your username.', // Custom message for username required error
            'password.required' => 'Please enter your password.', // Custom message for password required error
        ];
    }
}