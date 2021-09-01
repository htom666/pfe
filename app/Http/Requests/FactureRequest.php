<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactureRequest extends FormRequest
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
            'client_id' => 'required',
            'company_name' => 'required',
            'company_phone'=> 'required',
            'company_address'=> 'required',
            'invoice_number' => 'required',
            'invoice_date' => 'required',
            'expiration_date' => 'required',
            'tva' => 'required|numeric',
            'tax' =>'required|numeric',
            'ttc'=>'required|numeric',
            'pht'=>'required|numeric',
            

        ];
    }
    public function messages()
    {
        return [
            'client_id.required' => 'this field should no be empty',
            'company_name.required' => 'this field should no be empty',
            'company_phone.required' => 'this field should no be empty',
            'company_address.required' => 'this field should no be empty',
            'invoice_number.required' => 'this field should no be empty',
            'invoice_date.required' => 'this field should no be empty',
            'expiration_date.required' => 'this field should no be empty',
            'tva.required' => 'this field should no be empty',
            'tax.required' => 'this field should no be empty',
            'ttc.required' => 'this field should no be empty',
            'pht.required' => 'this field should no be empty',


            'tva.numeric' => 'incorrect format',
            'tax.numeric' => 'incorrect format',
            'ttc.numeric' => 'incorrect format',
            'pht.numeric' => 'incorrect format'


        ];
    }
}
