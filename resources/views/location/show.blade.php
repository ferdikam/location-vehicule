@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Location</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des locations</a>
                </li>
                <li class="active">
                    Location
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    <div class="col-md-8 col-md-offset-2">

            <div class="card-box">
                @if($location->status == 'pending')
                    <a href="#custom-statut-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                       data-overlaySpeed="200" data-overlayColor="#36404a">En attente de paiement</a>

                    <div id="custom-statut-modal" class="modal-demo">
                        <button type="button" class="close" onclick="Custombox.close();">
                            <span>&times;</span><span class="sr-only">Fermer</span>
                        </button>
                        <h4 class="custom-modal-title">Modifier le statut de location</h4>
                        <div class="custom-modal-text text-left">
                            <div class="modal-boy">
                                Voule-vous modifier le statut de la location ?
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-default" data-dismiss="modal" onclick="Custombox.close();">Annuler</a>
                                <a href="/location/statut/{{ $location->id }}" class="btn btn-primary">Payer</a>
                            </div>
                        </div>
                    </div>
                    
                @else
                    <span class="pull-right label label-default">Payé</span>
                @endif
                <h4 class="text-dark header-title m-t-0">
                    Location du véhicule {{ $location->vehicule->modele->marque->name }} {{ $location->vehicule->modele->name }} - {{ $location->vehicule->immatriculation }}
                </h4>
                <hr>
                Véhicule commandé par le client <strong>{{ $location->client->name }}</strong> du {{ format_date($location->date_start) }} au {{ format_date($location->date_end) }}
            </div>
        </div>
@endsection