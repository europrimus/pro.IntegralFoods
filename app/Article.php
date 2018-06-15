<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Article extends Model
{

    protected $fillable = [
        'titre', 'description','reference','ean'
    ];


  public static function getCatalogue($idClient){
    /*
    SELECT catalogueproduit.id as catalogue_id,
      produit_id,
      prix,
      conditionnement,
      titre as nom,
      description,
      reference
    FROM catalogueproduit
    JOIN articles ON catalogueproduit.produit_id = articles.id AND catalogueproduit.users_id = 2
    */
    $produits = DB::table('catalogueproduit')
      ->select('catalogueproduit.id as catalogue_id',
        'produit_id',
        'prix',
        'ean',
        'titre as nom',
        'description',
        'reference')
      ->where('users_id', $idClient)
      ->join('articles', 'catalogueproduit.produit_id', '=', 'articles.id')
      ->get();
    $produits = $produits->keyBy('catalogue_id');
    return $produits;
  }
}
