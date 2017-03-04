@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.notifications')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tableau de bord</div>

                <div class="panel-body">
                    Bienvenue - {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
