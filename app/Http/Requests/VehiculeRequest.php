<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeRequest extends FormRequest
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
            'modele_id' => 'required',
            'category_id' => 'required',
            'immatriculation' => 'required',
            'kilometrage' => 'required|numeric',
            'etat' => 'required',
            'places' => 'required|integer',
            'transmission' => 'required',
            'carburant' => 'required',

        ];
    }
}
