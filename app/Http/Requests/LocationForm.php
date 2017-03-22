<?php

namespace App\Http\Requests;

use App\Invoice;
use App\Location;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LocationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!Auth::guest())
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
            'vehicule_id' => 'required',
            'date_start' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Veuillez choisir un client',
            'vehicule_id.required' => 'Veuillez choisir un véhicule',
            'date_start.required' => 'La date de début est obligatoire',
        ];
    }

    public function persist()
    {
        $location = new Location;
        $location->client_id = $this->client_id;
        $location->vehicule_id = $this->vehicule_id;
        $location->date_start = $this->date_start;
        $location->date_end = $this->date_end;
        $location->token = str_random(8);        

        $location->save();

        $user = Auth::user();
        $user->locations()->attach($location);
    }
}
