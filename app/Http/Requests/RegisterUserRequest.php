<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
            'lastname' => 'required|string|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
            'birthday' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'email' => 'required|email|unique:usersinfo,email',
            'username' => 'required|string|unique:usersinfo,username',
            'password' => 'required|string|min:8',
            'confirm-password' => 'required|string|same:password',
            'agree' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.regex' => 'The first name may only contain letters, spaces, hyphens, and apostrophes.',
            'lastname.regex' => 'The last name may only contain letters, spaces, hyphens, and apostrophes.',
            'confirm-password.same' => 'The confirmation password must match the password.',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'firstname' => ucwords(strtolower(trim($this->firstname))),
            'lastname' => ucwords(strtolower(trim($this->lastname))),
            'username' => trim($this->username),
        ]);
    }
    
}