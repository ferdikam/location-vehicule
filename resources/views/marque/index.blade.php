@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h2>Liste des marques de véhicules</h2>
        </div>
        <div class="col-md-2">
            <a class="btn btn-primary" data-toggle="modal" href="#modal-create">
                <i class="fa fa-plus"></i> Ajouter
            </a>
           <div class="modal fade" id="modal-create">
           	<div class="modal-dialog">
           		<div class="modal-content">
           			<div class="modal-header">
           				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
           				<h4 class="modal-title">Ajout d'une marque</h4>
           			</div>
                    @include('marque.form')
           		</div><!-- /.modal-content -->
           	</div><!-- /.modal-dialog -->
           </div><!-- /.modal -->
        </div>
    </div>
    <hr>
    @include('layouts.errors')
    @if($marques->count() > 0)
        <div class="panel panel-default">
    	<div class="panel-body">
    	   <table class="table table-hover">
    	   	<thead>
    	   		<tr>
    	   			<th>Nom</th>
    	   			<th>Actions</th>
    	   		</tr>
    	   	</thead>
    	   	<tbody>
                @foreach($marques as $marque)
                    <tr>
                        <td>{{ $marque->name }}</td>
                        <td>
                            <a href="#" class="btn btn-info">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
    	   	</tbody>
    	   </table>
    	</div>
    </div>
    @else
        <div class="text-center text-muted">
            <strong>Aucune marque de véhicule enregistrée</strong><br>

            <a class="btn btn-primary" data-toggle="modal" href="#modal-create">
                <i class="fa fa-plus"></i> Ajouter
            </a>
            <div class="modal fade" id="modal-create">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            				<h4 class="modal-title">Ajout d'une marque</h4>
            			</div>
                        @include('marque.form')
            		</div><!-- /.modal-content -->
            	</div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    @endif
@endsection