<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'fullname' => 'required|string',
            'phonenumber' => [
                'required',
                'regex:/^[0-9]{10}$/'
            ],
            'username' => 'required|string|unique:users|max:255|min:2',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:5|max:255',
            'password_comfirmation' => 'required|same:password',
            'image' => 'required', // Add your desired validation rules here
        ];
    }
}
