@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Client</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="/client">Gestion des clients</a>
                </li>
                <li class="active">
                    Client
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    @include('layouts.errors')
    @if($clients->count() > 0)

        <div class="col-md-8 col-md-offset-2">
            <div class="card-box">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Enregistrer un client</h4>
                    <div class="custom-modal-text text-left">
                        <form method="post" action="/client" enctype="multipart/form-data">
                            @include('client.form', ['btnSubmit' => 'Enregistrer', 'client' => new \App\Client()])
                        </form>
                    </div>
                </div>

                <h4 class="text-dark header-title m-t-0">Liste des clients</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th style="min-width: 80px;">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td><a href="">{{ $client->name }}</a></td>
                                <td>
                                    <a href="#custom-modal-{{ $client->id }}" class="table-action-btn" data-animation="fadein" data-plugin="custommodal"
                                       data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-edit"></i></a>

                                    <div id="custom-modal-{{ $client->id }}" class="modal-demo">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Fermer</span>
                                        </button>
                                        <h4 class="custom-modal-title">Modifier un client</h4>
                                        <div class="custom-modal-text text-left">
                                            <form method="post" action="/edit/{{ $client->id }}/client" enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                @include('client.form', ['btnSubmit' => 'Modifier', 'client' => $client])
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
            <strong>Aucun client enregistré</strong><br>

            <a href="#custom-modal" class="btn btn-default btn-sm waves-effect waves-light" data-animation="fadein"
               data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Fermer</span>
                </button>
                <h4 class="custom-modal-title">Enregistrer une client</h4>
                <div class="custom-modal-text text-left">
                    <form method="post" action="/client" enctype="multipart/form-data">
                        @include('client.form', ['btnSubmit' => 'Enregistrer', 'client' => new \App\Client()])
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection