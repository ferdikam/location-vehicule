<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Operation;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locationRelances = Location::where('status', 'pending')->get();

        return view('home', compact('locationRelances'));
    }

    public function getEvents()
    {
        $locations = Location::with('vehicule',  'client')->get();
    
        $locationEvents = $locations->map(function($item){
            return [
                'title' => "{$item['vehicule']['modele']['marque']['name']} {$item['vehicule']['modele']['name']} {$item['vehicule']['immatriculation']}",
                'start' => $item['date_start']->toDateString(),
                'end' => $item['date_end']->toDateString(),
                'url' => "/location/{$item['id']}",
                'className' => 'bg-primary'
            ];
        });

        return $locationEvents;
    }

    public function getOperations()
    {

        $operations = Operation::with(['vehicule', 'typeOperation', 'fournisseur'])->get();
        $operationEvents = $operations->map(function($item){
            return [
                'title' => "Assurance - {$item['vehicule']['modele']['marque']['name']} {$item['vehicule']['modele']['name']} {$item['vehicule']['immatriculation']}",
                'start' => $item['date_next']->toDateString(),
                'url' => "/operation/{$item['id']}",
                'className' => 'bg-purple'
            ];
        });

        return $operationEvents;
    }
}
