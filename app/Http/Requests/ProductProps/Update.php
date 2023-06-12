<?php

namespace App\Http\Requests\ProductProps;

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
            'key_en'=>'nullable|string|max:255',
            'key_ar'=>'nullable|string|max:255',
            'value_en'=>'nullable|string|max:255',
            'value_ar'=>'nullable|string|max:255',
        ];
    }
}
