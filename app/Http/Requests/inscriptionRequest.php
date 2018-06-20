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
                'email' => 'required',
                'entreprise' => 'required',
                'etablissement' => 'required',
                'adresse' => 'required',
                'tel' => 'required',
                'etablissementautre' => 'nullable',
                'codePostal' => 'required',
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
          'entreprise.required' => 'Entreprise requis',
          'etablissement.required' => 'Etablisement requis',
          'adresse.required' => 'Adresse requis',
          'tel.required' => 'Télephone requis',
          'codePostal.required' => 'Code postal requis',
          'ville.required' => 'Ville requis',
          'commentaire.required' => 'Commentaire requis',
          'commentaire.size' => 'Commentaire de 20 caractère min requis',
      ];
    }
}
