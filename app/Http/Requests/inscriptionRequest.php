<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class inscriptionRequest extends FormRequest
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
                'civilite' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'bail|required|email',
                'entreprise' => 'required',
                'etablissement' => 'required',
                'adresse' => 'required',
                'tel' => 'bail|required|digits:10',
                'etablissementautre' => 'nullable',
                'codePostal' => 'bail|required|digits:5',
                'ville' => 'required',
                'commentaire' => 'required|min:20',
            ];
    }


    public function messages()
    {
      return [
          'civilite.required' => 'Civilité requis',
          'nom.required' => 'Nom requis',
          'prenom.required' => 'Prénom requis',
          'email.required' => 'Email requis',
          'email.email' => 'Adresse non valide',
          'entreprise.required' => 'Entreprise requis',
          'etablissement.required' => 'Etablisement requis',
          'adresse.required' => 'Adresse requis',
          'tel.required' => 'Télephone requis',
          'tel.digits' => ':digits chiffres',
          'codePostal.required' => 'Code postal requis',
          'codePostal.digits' => ':digits chiffres',
          'ville.required' => 'Ville requis',
          'commentaire.required' => 'Commentaire requis',
          'commentaire.min' => ':min caractère minimum requis',
      ];
    }
}
