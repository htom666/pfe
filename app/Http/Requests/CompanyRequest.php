<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'juridikform' => 'required',
            'siret' => 'required',
            'apenaf' => 'required',
            'tvaintra' => 'required',
            'immatricule' => 'required',
            'phone' => 'required',
            'fax' => 'required',
            'adresse' => 'required',
            'company_city' => 'required',
            'company_state' => 'required',
            'company_zip' => 'required',
            'bank_name' => 'required',
            'rib' => 'required',
            'iban' => 'required',
            'bic' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'client_id.required' => 'this field should not be emptry',
            'name.required' => 'this field should not be emptry',
            'juridikform.required' => 'this field should not be emptry',
            'siret.required' => 'this field should not be emptry',
            'apenaf.required' => 'this field should not be emptry',
            'tvaintra.required' => 'this field should not be emptry',
            'immatricule.required' => 'this field should not be emptry',
            'phone.required' => 'this field should not be emptry',
            'fax.required' => 'this field should not be emptry',
            'adresse.required' => 'this field should not be emptry',
            'company_city.required' => 'this field should not be emptry',
            'company_state.required' => 'this field should not be emptry',
            'company_zip.required' => 'this field should not be emptry',
            'bank_name.required' => 'this field should not be emptry',
            'rib.required' => 'this field should not be emptry',
            'iban.required' => 'this field should not be emptry',
            'bic.required' => 'this field should not be emptry'
        ];
    }
}
