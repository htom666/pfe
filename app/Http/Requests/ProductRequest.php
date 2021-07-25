<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'size' => 'required|numeric',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'this field should no be empty',
            'size.required' => 'this field should no be empty',
            'quantity.required' => 'this field should no be empty',
            'price.required' => 'this field should no be empty',
            'size.numeric' => 'the size needs to be a number',
            'quantity.numeric' => 'the quantity needs to be a number',
            'price.numeric' => 'the price format is incorrect',


        ];
    }
}
