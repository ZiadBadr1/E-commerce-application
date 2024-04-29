<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'price' => ['required'],
            'quantity' => ['required','integer'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'sub_category_id' => ['required', 'integer', 'exists:sub_categories,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
