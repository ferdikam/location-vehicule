<?php

namespace App\Http\Requests;

use App\Notifications\UserRegistered;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'adresse électronique est obligatoire',
            'email.email' => 'L\'adresse électronique doit être valide',
            'email.unique' => 'L\'adresse électronique existe déjà'
        ];
    }

    /**
     * Register new user and notification via email
     */
    public function persist()
    {
        $password = bin2hex(random_bytes(3));
        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = bcrypt($password);

        //dd($user->token());

        $user->save();
        $user->storeToken();

        // \Mail::to($user)->send(new Welcome);
        $user->notify(new UserRegistered($password));
    }


}
