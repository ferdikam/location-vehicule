@extends('layouts.app-user')

@section('content')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center">Nouveau lien de confirmation</h3>
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="/utilisateur/envoie-lien" method="post">
                {{ csrf_field() }}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="email" placeholder="Adresse électronique" required>
                    </div>
                </div>

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-default btn-block text-uppercase waves-effect waves-light" type="submit">Envoyer</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection