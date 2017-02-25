<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\VehiculeForm;
use App\Modele;
use App\Vehicule;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::with('modele', 'category')->latest()->get();

        $modeles = Modele::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('vehicule.index', compact('vehicules', 'modeles', 'categories'));
    }

    public function store(VehiculeForm $form)
    {
        $form->persist();

        Flashy::success('Véhicule enregistré avec succès');

        return redirect()->back();
    }

    public function update(VehiculeForm $form, $id)
    {
        $form->persist($id);

        Flashy::success('Véhicule modifié avec succès');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $vehicule->delete();

        Flashy::success('Véhicule supprimé avec succès');

        return redirect()->back();
    }
}
