<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientStoreForm;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('name')->get();

        return view('client.index', compact('clients'));
    }

    public function store(ClientStoreForm $request)
    {
        $request->persist();

        Flashy::success('Client ajouté avec succès');
        return back();
    }

    public function update($id, ClientStoreForm $request)
    {
        $request->persist($id);

        Flashy::success('Client modifié avec succès');
        return back();
    }
} 
