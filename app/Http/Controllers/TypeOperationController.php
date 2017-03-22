<?php

namespace App\Http\Controllers;

use App\TypeOperation;
use Illuminate\Http\Request;

class TypeOperationController extends Controller
{
    public function index()
    {
        $typeOperations = TypeOperation::orderBy('name')->get();

        return view('typeoperation.index', compact('typeOperations'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        TypeOperation::create(request(['name']));

        return redirect()->back();
    }
}
