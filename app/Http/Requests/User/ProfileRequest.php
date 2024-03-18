<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name' =>'required|min:4',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->id()), // Assuming the table name is 'users' and the column name is 'email'
            ],
            
            'phone' =>'min:8',
            'address' =>'min:5',
        ];
    }
}
