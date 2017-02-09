<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::orderBy('name')->get();

        return view('fournisseur.index', compact('fournisseurs'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        Fournisseur::create(request(['name']));

        return redirect()->back();
    }
}
