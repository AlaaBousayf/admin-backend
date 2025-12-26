<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discountPercentage' => 'nullable|numeric|min:0|max:100',
            'rating' => 'nullable|numeric|min:0|max:5',
            'stock' => 'required|integer|min:0',
            'brand' => 'nullable|string|max:255',
            'category' => 'required|string|exists:categories,name',
            'thumbnail' => 'nullable|string|url',
            'images' => 'nullable|array',
            'images.*' => 'string|url',
        ];
    }
}
