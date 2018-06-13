<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
  // nom de la table
  protected $table = 'commande';

  /**
   * liste des attributs renseignable
   *
   * @var array
   */
  protected $fillable = [
      'quantity',
      'adresseLivraison',
      'adresseFacturation',
  ];

  public function new($request){
    // on verifie la commande
    $requeteValide = $request->validated();
    dd($requeteValide);
    // on l'enregistre

  }

}
