@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Utilisateur</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des utilistaeurs</a>
                </li>
                <li class="active">
                    Utilisateur
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    @include('layouts.errors')
    @if($users->count() > 0)
        <div class="col-md-8 col-md-offset-2">
            <div class="card-box">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Enregistrer un utilisateur</h4>
                    <div class="custom-modal-text text-left">
                        <form method="POST" action="/registration">
                            @include('user.form', ['btnSubmit' => 'Enregistrer', 'user' => new \App\User()])
                        </form>
                    </div>
                </div>



                <h4 class="text-dark header-title m-t-0">Liste des utilisateurs</h4>
                <hr>

                <div class="table-responsive">
                    <table class="table table-actions-bar m-b-0">
                        <thead>
                        <tr>
                            <th>Nom complet</th>
                            <th>Adresse électronique</th>
                            <th style="min-width: 80px;">Manage</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }} <span class="label label-inverse">{{ $user->active ? '' : "Désactivé" }}</span></td>
                                <td>{{ $user->email }}</td>
                                <td>

                                    <a href="#" class="btn btn-sm btn-inverse">{{ $user->active ? 'Désactiver' : "Activer" }}</a>
                                    <a href="#custom-edit-modal-{{ $user->id }}" class="table-action-btn" data-animation="fadein"
                                       data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                        <i class="md md-edit"></i>
                                    </a>
                                    <div id="custom-edit-modal-{{ $user->id }}" class="modal-demo">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Fermer</span>
                                        </button>
                                        <h4 class="custom-modal-title">Enregistrer un véhicule</h4>
                                        <div class="custom-modal-text text-left">
                                            <form method="POST" action="/edit/{{ $user->id }}/vehicule">
                                                {{ method_field('PATCH') }}
                                                @include('user.form', ['btnSubmit' => 'Modifier', 'user' => $user])
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
            <strong>Aucun utilisateur enregistré</strong><br>

            <a href="#custom-modal" class="btn btn-default btn-sm waves-effect waves-light" data-animation="fadein"
               data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Fermer</span>
                </button>
                <h4 class="custom-modal-title">Enregistrer un utilisateur</h4>
                <div class="custom-modal-text text-left">
                    <form method="POST" action="/registration">
                        @include('user.form', ['btnSubmit' => 'Enregistrer', 'user' => new \App\User()])
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection