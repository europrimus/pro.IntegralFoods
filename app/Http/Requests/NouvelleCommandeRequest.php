<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\utilisateur;

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
        if( utilisateur::getMyRole(session("UserId") ) == "client"){
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
             "quantity" => 'bail|required|array',
             "adresseLivraison" => 'bail|required|alpha_num',
             "adresse" => 'bail|string|present|nullable',
             "codePostal" => 'bail|numeric|present|digits:5|nullable',
             "ville" => 'bail|string|present|nullable',
         ];
     }

     public function messages()
     {
       return [
           'quantity.required' => 'Vous devez ajouter des produits au panier',
           'adresseLivraison.alpha_num' => 'Vous devez choisir une adresse de livraison',
           'adresseLivraison.required' => 'Vous devez choisir une adresse de livraison',
           'codePostal.numeric' => 'Le code postale doit etre un nombre',
           'codePostal.digits' => 'Le code postale doit avoir :digits chiffres'
       ];
     }

}
