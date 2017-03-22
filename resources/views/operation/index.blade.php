@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Opération</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des opérations</a>
                </li>
                <li class="active">
                    Opération
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    @include('layouts.errors')

    @if($operationsValidated->count() > 0)
        <div class="col-md-9 col-md-offset-1">
            <div class="card-box">

                <h4 class="text-dark header-title m-t-0">Liste des opérations validées</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                        <tr>
                            <th>Type d'opération</th>
                            <th>Fournisseur</th>
                            <th>Marque</th>
                            <th>modele</th>
                            <th>Immatriculation</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th style="min-width: 80px;">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operationsValidated as $operationValidated)
                            <tr>
                                <td>{{ $operationValidated->typeOperation->name }}</td>
                                <td>
                                    @if(!is_null($operationValidated->fournisseur))
                                        {{ $operationValidated->fournisseur->name }}
                                    @endif
                                </td>
                                <td>{{ $operationValidated->vehicule->modele->marque->name }}</td>
                                <td>{{ $operationValidated->vehicule->modele->name }}</td>
                                <td>{{ $operationValidated->vehicule->immatriculation }} </td>
                                <td>{{ $operationValidated->date->toRssString() }}</td>
                                <td>{{ $operationValidated->date_next->toRssString() }}</td>
                                <td>
                                    <a href="#" class="table-action-btn"><i class="md md-edit"></i></a>
                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    @endif

    @if($operations->count() > 0)
        <div class="col-md-9 col-md-offset-1">

            <div class="card-box">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light"
                   data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Enregistrer une opération</h4>
                    <div class="custom-modal-text text-left">
                        <form method="POST" action="/operation">
                            @include('operation.form', ['btnSubmit' => 'Enregistrer','operation' => new \App\Operation()])
                        </form>
                    </div>
                </div>



                <h4 class="text-dark header-title m-t-0">Liste des opérations à valider</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                        <tr>
                            <th>Type d'opération</th>
                            <th>Fournisseur</th>
                            <th>Vehicule</th>
                            <th>Montant</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th style="min-width: 80px;">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($operations as $operation)
                            <tr>
                                <td>{{ $operation->typeOperation->name }}</td>
                                <td>
                                    @if(!is_null($operation->fournisseur))
                                        {{ $operation->fournisseur->name }}
                                    @endif
                                </td>
                                <td>{{ $operation->vehicule->modele->marque->name }} {{ $operation->vehicule->modele->name }} - {{ $operation->vehicule->immatriculation }}</td>
                                <td>{{ $operation->montant }} </td>
                                <td>{{ format_date($operation->date) }}</td>
                                <td>{{ format_date($operation->date_next) }}</td>
                                <td>
                                    <a href="#custom-validated-modal-{{ $operation->id }}" class="table-action-btn" data-animation="fadein"
                                       data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                        <i class="md md-done"></i>
                                    </a>
                                    <div id="custom-validated-modal-{{ $operation->id }}" class="modal-demo">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Fermer</span>
                                        </button>
                                        <h4 class="custom-modal-title">Validation de l'opération</h4>
                                        <div class="custom-modal-text">
                                            <form method="POST" action="/operation_validated">
                                                @include('operation.formValidated', ['btnSubmit' => 'Oui'])
                                            </form>
                                        </div>
                                    </div>
                                    <a href="#custom-edit-modal-{{ $operation->id }}" class="table-action-btn" data-animation="fadein"
                                       data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                        <i class="md md-edit"></i>
                                    </a>
                                    <div id="custom-edit-modal-{{ $operation->id }}" class="modal-demo">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Fermer</span>
                                        </button>
                                        <h4 class="custom-modal-title">Validation de l'opération</h4>
                                        <div class="custom-modal-text">
                                            <form method="POST" action="/operation_validated">
                                                {{ method_field('PATCH') }}
                                                @include('operation.form', ['btnSubmit' => 'Modifier', 'operation' => new \App\Operation()] )
                                            </form>
                                        </div>
                                    </div>
                                    <a href="#" class="table-action-btn"><i class="md md-close"></i></a>
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
            <strong>Aucune opération enregistrée</strong><br>

            <a href="#custom-modal" class="btn btn-default btn-sm waves-effect waves-light" data-animation="fadein"
               data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Fermer</span>
                </button>
                <h4 class="custom-modal-title">Enregistrer une opération</h4>
                <div class="custom-modal-text text-left">
                    <form method="POST" action="/operation">
                        @include('operation.form', ['btnSubmit' => 'Enregistrer','operation' => new \App\Operation()])
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection