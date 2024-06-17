<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name'=>'required|string|min:4',
            'name_ar'=>'required|string|min:4',
            'status'=>'required|numeric',
            'price'=>'required|numeric',
            'count'=>'required|numeric',
            'category'=>'required|numeric',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:20480',
            'description'=>'required|string'
        ];
    }
}
