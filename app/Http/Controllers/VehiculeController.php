<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\VehiculeRequest;
use App\Modele;
use App\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::with('modele', 'category')->latest()->get();

        $modeles = Modele::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('vehicule.index', compact('vehicules', 'modeles', 'categories'));
    }

    public function store(VehiculeRequest $request)
    {
        Vehicule::create([
            "modele_id" => $request->modele_id,
          "category_id" => $request->category_id,
          "immatriculation" => $request->immatriculation,
          "kilometrage" => $request->kilometrage,
          "puissance" => $request->puissance,
          "etat" => $request->etat,
          "poids_vide" => $request->poids_vide,
          "places" => $request->places,
          "transmission" => $request->transmission,
          "carburant" => $request->carburant,
          "date_arrivee" => $request->date_arrivee,
        ]);

        return redirect()->back();
    }
}
