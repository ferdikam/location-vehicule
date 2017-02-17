<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\LocationForm;
use App\Location;
use App\Vehicule;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->get();
        $clients = Client::orderBy('name')->get();
        $vehicules = Vehicule::with('modele')->latest()->get();

        return view('location.index', compact('locations', 'clients', 'vehicules'));
    }

    public function statut($id)
    {
        $location = Location::findOrFail($id);
        $location->status = "paid";
        $location->save();

        Flashy::success('Règlement de la location effectué');
        return redirect()->back();
    }

    public function store(LocationForm $request)
    {
        $request->persist();

        Flashy::success('Location ajoutée avec succès');
        return redirect()->back();
    }
}
