<?php

namespace App\Http\Requests\Front\Order;

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
            'total' => 'required|numeric',
            'sub_total' => 'required|numeric',
            'full_name' => 'required|string|min:3|max:55',
            'phone' => 'required|string|min:10',
            'email' => 'required|email|unique:users',
            'country' => 'required|string|min:5|max:30',
            'state' => 'required|string|min:5|max:30',
            'cityAndP-c' => 'required|string|min:5|max:30',
        ];
    }
    //     public function messages()
    //     {
    //         return [
    //             'sub_total.requried' => 'Total Is Requried',
    //             'full_name.requried' => 'Please Enter Your Full Name',
    //             'full_name.string' => 'Your Name Must Be A String',
    //             'full_name.min' => 'Full Name Must Be At Least 3 Characters',
    //             'full_name.max' => 'Full Name Can Not Be More Than  55 Character',
    //             'phone.requried' => 'Please Enter Your Phone ',
    //             'phone.numeric' => 'Your Phone Must Constists From Numbers',
    //             'phone.min' => 'Your PhoneMust Be At Least 10 Characters',
    //             'email.requried' => 'Please Enter Your Email ',
    //             'email.email' => ' ',
    //         ];
    //     }
}
