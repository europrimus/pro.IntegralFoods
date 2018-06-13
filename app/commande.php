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

}
