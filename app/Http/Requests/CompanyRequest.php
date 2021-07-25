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
            'nomsociete' => 'required',
            'type' => 'required',
            'formjuridique' => 'required',
            'siret' => 'required',
            'apenaf' => 'required',
            'tvaintracommunautaire' => 'required',
            'numimmatriculation' => 'required',
            'telephonesocite' => 'required',
            'portablesociete' => 'required',
            'fax' => 'required',
            'siteweb' => 'required',
            'adresse' => 'required',
            'adresse2' => 'required',
            'codepostal' => 'required',
            'formjuridique' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'banque' => 'required',
            'rib' => 'required',
            'iban' => 'required',
            'bic' => 'required',
            'montantgaranti' => 'required',
            'modesaisieprix' => 'required',
            'commentaire' => 'required',
        ];
    }
}
