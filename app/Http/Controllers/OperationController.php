<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationRequest;
use App\Operation;
use App\Vehicule;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::with('vehicule')->latest()->get();

        $vehicules = Vehicule::with('modele')->latest()->get();

        dd($vehicules);

        return view('operation.index', compact('operations', 'vehicules'));
    }

    public function store(OperationRequest $request)
    {
        Operation::create($request->all());

        return redirect()->back();
    }
}
