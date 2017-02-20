@extends('layouts.app-user')

@section('content')
    <div class=" card-box">
        <div class="panel-heading">
            <h3 class="text-center">Connexion</h3>
        </div>


        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Adresse électronique</label>

                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Envoi du lien de réinitialisation du mot de passe
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
