<?php

namespace App\Http\Requests\ProductImages;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'subImg' => 'required|image',
            'productId' => 'required|numeric',
        ];
    }
    public function messages(): array
    {
        return [
            'subImg.required' => 'Image Is Required',
            'subImg.image' => 'File Must Be An Image',
        ];
    }
}
