<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\utilisateur;

class ValiderPrixRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // si admin
        if( utilisateur::getMyRole(session("UserId")) == "administrateur"){
          return true;
        }else{
          return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "prix" => 'bail|required|array',
            "loginClient" => 'bail|required|string|min:6',
            "mdpClient" => 'bail|required|string|min:6',
            "Siret" => 'bail|required|string|min:9',
        ];
    }

    public function messages()
    {
      return [
          'prix.required' => 'Vous devez choisir au moins un prix',
          'loginClient.required' => 'Vous devez définir un login client',
          'loginClient.min' => 'Le login doit faire au moin :min caractères',
          'mdpClient.required' => 'Vous devez définir un mot de passe client',
          'mdpClient.min' => 'Le mot de passe doit faire au moin :min caractères',
      ];
    }
}
