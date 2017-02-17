<?php

namespace App\Http\Requests;

use App\Client;
use Illuminate\Foundation\Http\FormRequest;

class ClientStoreForm extends FormRequest
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
            'phone1' => 'required',
            'file_cni' => 'mimes:jpeg,jpg,bmp,png'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Le nom du client est obligatoire',
            'phone1.required' => 'Le numéro de téléphone est obligatoire',
            'file_cni.mimes' => 'Le fichier doit être une image'
        ];
    }

    public function persist()
    {
        $client = new Client;

        $name = $this->name;

        $path = '';

        if ($this->hasFile('file_cni')) {
            $file = $this->file('file_cni');

            $extension = $file->guessClientExtension();

            $path = $file->storeAs('images', str_slug($name).".{$extension}", 'public');
        }

        $client->name = $name;
        $client->phone1 = $this->phone1;
        $client->phone2 = $this->phone2;
        $client->address = $this->address;
        $client->num_cni = $this->num_cni;
        $client->file_cni = $path;

        $client->save();

    }
}
