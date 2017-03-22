@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Facture</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des factures</a>
                </li>
                <li class="active">
                    facture
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    @include('layouts.errors')
    @if($invoices->count() > 0)

        <div class="col-md-8 col-md-offset-2">
            <div class="card-box">


                <h4 class="text-dark header-title m-t-0">Liste des factures</h4>
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
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>
                                    {{ $invoice->title }}
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
            <strong>Aucune facture enregistrée</strong><br>
        </div>
    @endif
@endsection