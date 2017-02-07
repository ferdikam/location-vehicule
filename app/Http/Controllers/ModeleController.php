<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function index()
    {
        $marques = Marque::orderBy('name')->get();
        $modeles = Modele::all();

        return view('modele.index', compact('marques', 'modeles'));

    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'marque_id' => 'required'
        ]);

        Modele::create(request(['name', 'marque_id']));

        return redirect()->back();
    }
}
