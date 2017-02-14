<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
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
        if (!$user->active){
            return back();
        }

        if(!auth()->attempt(request(['email', 'password']))){
            return back();
        }

        return redirect()->home();
    }

    public function destroy()
    {
        $this->guard()->logout();

        request()->session()->flush();
        request()->session()->regenerate();

        return redirect()->login();
    }

    protected function guard()
    {
        return Auth::guard();
    }
}