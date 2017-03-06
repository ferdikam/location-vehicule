<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
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
        return view('home');
    }

    public function getEvents()
    {
        $locations = Location::with('vehicule',  'client')->get();
        
        $locationEvents = $locations->map(function($item){
            return [
                'title' => $item['vehicule']['immatriculation'],
                'start' => $item['date_start']->toDateString(),
                'end' => $item['date_end']->toDateString()
            ];
        });

        return $locationEvents;
    }
}
