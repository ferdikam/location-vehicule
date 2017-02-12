<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use App\Notifications\UserRegistered;
use App\User;
use App\UsersLoginToken;
use Flashy;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('user.index', compact('users'));
    }

    /**
     * @param RegistrationForm $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegistrationForm $form)
    {
        $form->persist();

        Flashy::info('Utilisateur crée avec succès. un email contenant cotre mot de passe a été envoyé pour valider votre inscription');
        return redirect()->back();
    }

    public function confirm($id,UsersLoginToken $token)
    {
        $user = $token->user;


        if($token->isExpired())
        {
            Flashy::info('Le lien a expiré. Veuillez rentrer votre adresse électronique.');
            return redirect('/utilisateur/envoie-lien');
        }

        if(!$token->belongsToId($id))
        {
            Flashy::error('Utilisateur invalide.');
            return redirect('/home');
        }

        $token->delete();

        $user->active = 1;
        $user->save();

        auth()->login($user);


        return redirect('/home');

    }

    public function send()
    {
        return view('user.send');
    }

    public function sendLink()
    {
        $user = User::where('email', request(['email']))->first();

        if(!$user)
        {
            return back();
        }

        $password = bin2hex(random_bytes(3));

        $user->password = bcrypt($password);

        $user->save();
        $user->storeToken();

        $user->notify(new UserRegistered($password));

        return redirect()->back();

    }
}
