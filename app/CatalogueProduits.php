<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogueProduits extends Model
{

  // nom de la table
  protected $table = 'catalogueproduit';

  protected $fillable = [
      'prix', 'produit_id','conditionnement'
  ];

  public function article()
    {
      return $this->hasOne('App\Article');
    }
}
