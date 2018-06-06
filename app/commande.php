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
      'numero de commande',
      'adresse de livraison',
      'adresse de facturation',
  ];
}
