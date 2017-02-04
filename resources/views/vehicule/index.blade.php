@extends('layouts.app')

@section('content')
    <h2>Liste des véhicules</h2>
    @if($vehicules->count() > 0)
    <div class="panel panel-default">
    	<div class="panel-body">
    	   <table class="table table-hover">
    	   	<thead>
    	   		<tr>
					<th>Modèle</th>
    	   			<th>Immatriculation</th>
    	   			<th>Catégorie</th>
    	   			<th>Actions</th>
    	   		</tr>
    	   	</thead>
    	   	<tbody>
				@foreach($vehicules as $vehicule)
					<tr>
						<td>{{ $vehicule->modele->name }}</td>
						<td>{{ $vehicule->immatriculation }}</td>
						<td>{{ $vehicule->category->name }}</td>
						<td>
							<a href="#" class="btn btn-info">
								<i class="fa fa-pencil-square-o"></i>
							</a>
							<a href="#" class="btn btn-primary">
								<i class="fa fa-cart-plus"></i>
							</a>
						</td>
					</tr>
				@endforeach
    	   	</tbody>
    	   </table>
    	</div>
    </div>
    @else
        <div class="text-center">
            <h4>Aucun véhicule</h4>
            <p>
                <a class="btn btn-primary" data-toggle="modal" href="#modal-create">Ajouter un véhicule</a>
                <div class="modal fade text-left" id="modal-create">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header">
                				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                				<h4 class="modal-title">Enregistrer un véhicule</h4>
                			</div>
                            <form method="POST" action="/vehicule">
                			    @include('vehicule.form')
                            </form>
                		</div><!-- /.modal-content -->
                	</div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </p>
        </div>
    @endif
@endsection