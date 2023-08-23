<?php

namespace App\Http\Requests\CartItems;

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
            'quantity' => 'required|array',
        ];
    }

    public function messages(): array
    {
        return [
            'quantity.required' => ' Quantity is required',
        ];
    }
}
