<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NouvelleArticleRequest extends FormRequest
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
                'titre' => 'required|min:5|max:191',
                'description' => 'required|min:5',
                'reference' => 'required',
                'ean' => 'required',
                'photo' => 'required'
            ];
    }

    public function messages()
    {
      return [
          'titre.required' => 'Vous devez ajouter un nom de produit',
          'description.required' => 'Vous devez ajouter un déscription du produit',
          'reference.required' => 'Vous devez ajouter une référence',
          'ean.required' => 'Vous devez ajouter un EAN',
          'photo.required' => 'Vous devez ajouter une photo',
      ];
    }
}
