<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
  // nom de la table
  protected $table = 'commandes';

  /**
   * liste des attributs renseignable
   *
   * @var array
   */
  protected $fillable = [
      'produitUserID',
      'adresseLivraisonID',
      'ville',
  ];
}
