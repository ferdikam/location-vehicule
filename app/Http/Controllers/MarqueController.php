<?php

namespace App\Http\Controllers;

use App\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('marque.index', compact('marques'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        Marque::create(request(['name']));

        return redirect()->back();
    }
}
