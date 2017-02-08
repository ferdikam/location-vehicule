@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Marque</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des vehicules</a>
                </li>
                <li class="active">
                    Catégorie
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    @include('layouts.errors')
    @if($categories->count() > 0)

        <div class="col-md-8 col-md-offset-2">
            <div class="card-box">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Enregistrer une catégorie</h4>
                    <div class="custom-modal-text text-left">
                        <form method="post" action="/category">
                            @include('modele.form', ['btnSubmit' => 'Enregistrer'])
                        </form>
                    </div>
                </div>

                <h4 class="text-dark header-title m-t-0">Liste des catégories de véhicules</h4>
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
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>
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

    @else
        <div class="text-center text-muted">
            <strong>Aucune catégorie de véhicule enregistrée</strong><br>

            <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein"
               data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">Ajouter</a>
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Fermer</span>
                </button>
                <h4 class="custom-modal-title">Enregistrer une catégorie</h4>
                <div class="custom-modal-text text-left">
                    <form method="post" action="/category">
                        @include('modele.form', ['btnSubmit' => 'Enregistrer'])
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection