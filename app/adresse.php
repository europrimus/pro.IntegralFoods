<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adresse extends Model
{
  // nom de la table
  protected $table = 'adresses';

  /**
   * liste des attributs renseignable
   *
   * @var array
   */
  protected $fillable = [
      'adresse',
      'codepostal',
      'ville',
  ];

}
