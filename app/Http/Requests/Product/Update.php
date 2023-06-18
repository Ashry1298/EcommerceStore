<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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

            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'category_id' => 'required|numeric',
            'tags' => 'required|array',
            'sizes' => 'required|array',
            'desc_en' => 'required|string',
            'desc_ar' => 'required|string',
            'price' => 'required|numeric',
            'main_image' => 'nullable|image',
            'key_en'=>'nullable|string|max:255',
            'key_ar'=>'nullable|string|max:255',
            'value_en'=>'nullable|string|max:255',
            'value_ar'=>'nullable|string|max:255',
            'color_ar' => 'required|string',
            'color_en' => 'required|string',
        ];
    }
}
