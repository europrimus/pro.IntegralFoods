<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NouvelleCommandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // verifier si l'utilisateur est enregistrer
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
             "quantity" => 'bail|required|array',
             "adresseLivraison" => 'bail|required|alpha_num',
             "adresse" => 'bail|string|present',
             "codePostal" => 'bail|numeric|present|digits:5',
             "ville" => 'bail|string|present',
         ];
     }

     public function messages()
     {
       return [
           'quantity.required' => 'Vous devez ajouter des produits au panier',
           'adresseLivraison.alpha_num' => 'Vous devez choisir une adresse de livraison',
           'adresseLivraison.required' => 'Vous devez choisir une adresse de livraison',
           'codePostal.numeric' => 'Le code postale doit etre un nombre',
       ];
     }

}
