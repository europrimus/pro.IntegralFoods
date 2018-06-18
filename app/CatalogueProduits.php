<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogueProduits extends Model
{

  // nom de la table
  protected $table = 'catalogueproduit';

  protected $fillable = [
      'prix', 'produit_id', 'users_id'
  ];

  public function article()
    {
      return $this->hasOne('App\Article');
    }
}
