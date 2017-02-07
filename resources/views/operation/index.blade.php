@extends('layouts.app')

@section('header-title')
    @include('layouts.car-header')
@endsection

@section('content')
    <h2>Liste des opérations</h2>
    @if($operations->count() > 0)
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>Type d'opération</th>
        			<th>Véhicule</th>
        			<th>Marque</th>
        			<th>Date de début</th>
        			<th>Date de fin</th>
        			<th>Actions</th>
        		</tr>
        	</thead>
        	<tbody>
                @foreach($operations as $operation)
                    <tr>
                        <td>{{ $operation->name }}</td>
                        <td>{{ $operation->vehicule->immatriculation }}</td>
                        <td></td>
                        <td>{{ $operation->date }}</td>
                        <td>{{ $operation->date_next }}</td>
                        <td></td>
                    </tr>
                @endforeach
        	</tbody>
        </table>
    @else
        <div class="text-center">
            <h4>Aucune opération enregistrée</h4>
            <p>
                <a class="btn btn-primary" data-toggle="modal" href="#modal-create">Ajouter une opération</a>
            <div class="modal fade text-left" id="modal-create">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Enregistrer une opération</h4>
                        </div>
                        <form method="POST" action="/operation">
                            @include('operation.form')
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </p>
        </div>
    @endif
@endsection