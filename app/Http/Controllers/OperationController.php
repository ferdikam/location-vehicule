<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use App\Http\Requests\OperationRequest;
use App\Operation;
use App\TypeOperation;
use App\Vehicule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OperationController extends Controller
{
    
    
    public function index()
    {
        
        $operations = Operation::with(['vehicule', 'typeOperation', 'fournisseur'])
                        ->where('validated', 0)
                        ->latest()->get();

        $operationsValidated = Operation::with(['vehicule', 'typeOperation', 'fournisseur'])
                                ->where('validated', 1)
                                ->latest()->get();

        $vehicules = Vehicule::with(['modele', 'operations'])->latest()->get();
        $typeoperations = TypeOperation::orderBy('name')->get();
        $fournisseurs = Fournisseur::all();

        return view('operation.index', compact('operations', 'operationsValidated', 'vehicules', 'typeoperations', 'fournisseurs'));
    }

    public function store(OperationRequest $request)
    {
        
        Operation::create($request->all());

        return redirect()->back();
    }

    public function validated()
    {
        $operation = Operation::findOrFail(request()->operation_id);
        if(request()->validated == '0')
        {
            $operation->validated = 1;
        }
            

        $operation->save();

        return redirect()->back();
    }
}
