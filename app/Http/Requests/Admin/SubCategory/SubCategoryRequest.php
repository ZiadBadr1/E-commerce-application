<?php

namespace App\Http\Requests\Admin\SubCategory;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'icon' => ['nullable','image','mimes:png,jpg,jpeg'],
            'category_id' => ['required', 'integer','exists:categories,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
