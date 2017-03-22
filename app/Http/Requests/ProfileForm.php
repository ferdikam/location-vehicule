<?php

namespace App\Http\Requests;

use App\Profile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileForm extends FormRequest
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
            'phone1' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone1.required' => 'Le téléphone 1 est obligatoire'
        ];
    }

    public function persist()
    {
        $user = Auth::user();
        $profile = new Profile;

        $profile->phone1 = $this->phone1;
        $profile->phone2 = $this->phone2;

        $user->profile()->save($profile);
    }
}
