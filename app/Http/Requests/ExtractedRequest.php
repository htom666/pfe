<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtractedRequest extends FormRequest
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
        
            'number' => 'required',
            'date' => 'required',
            'address' => 'required',
            'dest' => 'required',
            'amount' => 'required',
            'products' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'number.required' => 'this field should not be emptry',
            'date.required' => 'this field should not be emptry',
            'address.required' => 'this field should not be emptry',
            'dest.required' => 'this field should not be emptry',
            'amount.required' => 'this field should not be emptry',
            'products.required' => 'this field should not be emptry',
        ];
    }
}
