<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
