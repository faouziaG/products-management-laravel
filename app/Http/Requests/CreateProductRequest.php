<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|string',
            'quantity' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The product name field is required.',
            'name.max' => 'The product name field may not be greater than :max characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description field must be a string.',
            'size.required' => 'The product size field is required.',
            'size.string' => 'The product size field must be a number.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price field must be a number.',
            'type.required' => 'The type field is required.',
            'type.string' => 'The type field must be a string.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.numeric' => 'The quantity field must be an number.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Product name',
            'description' => 'Product description',
            'size' => 'Product size',
            'price' => 'Product price',
            'type' => 'Product type',
            'quantity' => 'Product quantity',
        ];
    }
}
