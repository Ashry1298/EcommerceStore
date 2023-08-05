<?php

namespace App\Http\Requests\CartItems;

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
            'category_size_id' => 'required|int',
            'product_color_id' => 'required|int',
            'quantity' => 'required|int',
        ];
    }

    public function messages(): array
    {
        return [
            'category_size_id.required' => ' Size is required',
            'product_color_id.required' => ' Color is required',
            'quantity.required' => ' Quantity is required',
        ];
    }
}
