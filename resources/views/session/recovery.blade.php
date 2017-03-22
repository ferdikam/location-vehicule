@extends('layouts.app-user')

@section('content')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center">Connexion</h3>
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="/login" method="post">
                {{ csrf_field() }}
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="email" name="email" placeholder="Adresse électronique" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" placeholder="Mot de passe" required>
                    </div>
                </div>

                {{--<div class="form-group ">--}}
                {{--<div class="col-xs-12">--}}
                {{--<div class="checkbox checkbox-primary">--}}
                {{--<input id="checkbox-signup" type="checkbox">--}}
                {{--<label for="checkbox-signup">--}}
                {{--Remember me--}}
                {{--</label>--}}
                {{--</div>--}}

                {{--</div>--}}
                {{--</div>--}}

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-default btn-block text-uppercase waves-effect waves-light" type="submit">Se connecter</button>
                    </div>
                </div>

                <div class="form-group m-t-30 m-b-0">
                    <div class="col-sm-12">
                        <a href="/forgot-password" class="text-dark"><i class="fa fa-lock m-r-5"></i> Mot de passe oublié?</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection