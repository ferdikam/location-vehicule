<?php

namespace App\Http\Requests;

use App\Vehicule;
use Illuminate\Foundation\Http\FormRequest;

class VehiculeForm extends FormRequest
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

    public function messages()
    {
        return [
            'modele_id.required' => 'Le modèle du véhicule est obligatoire',
            'category_id.required' => 'La catégorie du véhicule est obligatoire',
            'immatriculation.required' => 'L\'immatriculation du véhicule est obligatoire',
            'kilometrage.required' => 'Le kilometrage du véhicule est obligatoire',
            'kilometrage.numeric' => 'Le kilometrage doit uniquement contenir que des chiffres',
            'etat.required' => 'L\'état du véhicule est obligatoire',
            'places.required' => 'Le nombre de places est obligatoire',
            'places.integer' => 'Le nombre de places doit être un entier positif',
            'transmission.required' => 'La transmission est obligatoire',
            'carburant.required' => 'Le type de carburant est obligatoire',
        ];
    }

    public function persist($id = null)
    {
        if(!is_null($id))
            $vehicule = Vehicule::findOrFail($id);
        else
            $vehicule = new Vehicule;

        $vehicule->modele_id = $this->modele_id;
        $vehicule->category_id = $this->category_id;
        $vehicule->immatriculation = $this->immatriculation;
        $vehicule->kilometrage = $this->kilometrage;
        $vehicule->puissance = $this->puissance;
        $vehicule->etat = $this->etat;
        $vehicule->poids_vide = $this->poids_vide;
        $vehicule->places = $this->places;
        $vehicule->transmission = $this->transmission;
        $vehicule->carburant = $this->carburant;
        $vehicule->date_arrivee = $this->date_arrivee;

        $vehicule->save();
    }
}
