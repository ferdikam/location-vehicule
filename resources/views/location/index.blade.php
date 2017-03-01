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
    @include('layouts.errors')
    @if($locations->count() > 0)

        <div class="col-md-8 col-md-offset-2">
            <div class="card-box">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Enregistrer une location</h4>
                    <div class="custom-modal-text text-left">
                        <form method="post" action="/location">
                            @include('location.form', ['btnSubmit' => 'Enregistrer', 'location' => new \App\Location()])
                        </form>
                    </div>
                </div>

                <h4 class="text-dark header-title m-t-0">Liste des locations</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                        <tr>
                            <th>Vehicule</th>
                            <th>Client</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th style="min-width: 80px;">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>
                                    {{ $location->vehicule->modele->marque->name }} {{ $location->vehicule->modele->name }} - {{ $location->vehicule->immatriculation }}
                                </td>
                                <td>{{ $location->client->name }}</td>
                                <td>{{ format_date($location->date_start) }}</td>
                                <td>{{ format_date($location->date_end) }}</td>
                                <td>
                                    @if($location->status != 'paid')
                                        <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                        <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                    @endif
                                    @if($location->status == 'pending')
                                    <a href="#custom-statut-modal" class="btn btn-inverse btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                                       data-overlaySpeed="200" data-overlayColor="#36404a">
                                        {{ status($location->status) }}
                                    </a>
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
                                        <span class="label label-default">{{ status($location->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    @else
        <div class="text-center text-muted">
            <strong>Aucune location de véhicule enregistrée</strong><br>

            <a href="#custom-modal" class="btn btn-default btn-sm waves-effect waves-light" data-animation="fadein"
               data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Fermer</span>
                </button>
                <h4 class="custom-modal-title">Enregistrer une location</h4>
                <div class="custom-modal-text text-left">
                    <form method="post" action="/location">
                        @include('location.form', ['btnSubmit' => 'Enregistrer', 'location' => new \App\Location()])
                    </form>
                </div>
                </div>
            </div>
        </div>
    @endif
@endsection