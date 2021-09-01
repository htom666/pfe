<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'price' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'this field should no be empty',
            'price.required' => 'this field should no be empty',     
            'price.numeric' => 'the price format is incorrect',


        ];
    }
}
