<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessUserRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required'],
            'username' => ['required', 'min:8'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->user()->id],
            'user_image' => ['image', 'mimes:jpeg,png,gif,jpg']
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'username.required' => 'Username is required!',
            'email.email' => 'Email field must be email address.'
        ];
    }
}
