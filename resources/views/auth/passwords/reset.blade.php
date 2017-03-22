@extends('layouts.app-user')

@section('content')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center">Connexion</h3>
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-xs-12">
                        <input id="email" type="email" placeholder="Adresse électronique" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password" placeholder="Mot de passe" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="col-xs-12">
                        <input id="password-confirm" placeholder="Confirmer mot de passe" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-default btn-block text-uppercase waves-effect waves-light">
                            Réinitialiser mot de passe
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
