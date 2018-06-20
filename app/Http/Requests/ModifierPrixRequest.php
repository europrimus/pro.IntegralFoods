<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\utilisateur;

class ModifierPrixRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // si admin
        if( utilisateur::getMyRole(session("UserId")) == "administrateur" ){
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
        ];
    }

    public function messages()
    {
      return [
          'prix.required' => 'Vous devez choisir au moins un prix',
      ];
    }
}
