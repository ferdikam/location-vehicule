<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use MercurySeries\Flashy\Flashy;

class SessionController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $user = User::where('email', request(['email']))->first();

        if(!$user){
            Flashy::error('Aucun compte ne correspond à cet utilisateur. Veuillez contacter l\'administrateur');
            return back();
        }

        if (!$user->active){
            Flashy::error('Votre compte n\'est pas activé');
            return back();
        }

        if(!auth()->attempt(request(['email', 'password']))){
            Flashy::error('Votre adresse électronique ou votre mot de passe est incorrecte');
            return back();
        }

        Flashy::success('Bienvenue');
        return redirect()->home();
    }

    public function destroy()
    {
        $this->guard()->logout();

        request()->session()->flush();
        request()->session()->regenerate();

        return redirect()->login();
    }

    public function recovery()
    {
        return view('session.recovery');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
