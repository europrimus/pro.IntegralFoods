<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Article extends Model
{

    protected $fillable = [
        'titre', 'description','reference','ean'
    ];

// liste du catalogue client
  public static function getCatalogue($idClient){
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

// liste de tout les produits avec les prix du clients
  public static function getAll($idClient){
    $produits = Article::All();
    $produits = $produits->keyBy('id')->toArray();
    $catalogue = Article::getCatalogue($idClient);
    $catalogue = $catalogue->keyBy('produit_id')->toArray();
    //dd($catalogue);
    foreach ($produits as $key => $value) {
      if( isset($catalogue[$key]->prix) ){
        $produits[$key]["prix"]=$catalogue[$key]->prix;
        $produits[$key]["catalogue_id"]=$catalogue[$key]->catalogue_id;
      }else{
        $produits[$key]["prix"]=null;
        $produits[$key]["catalogue_id"]=null;
      }
    }
    return $produits;
  }
}
