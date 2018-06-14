<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{

  /**
   * Ajoute un article au panier.
   *
   * @return
   * si ok : le contenu du panier
   * si erreur:  false
   */
  public static function ajouter(int $idArticle  ,int $quantite ){
    $panier=session("panier");
    if( isset($panier[$idArticle]) ) {
      $panier[$idArticle] += $quantite;
    }else{
      $panier[$idArticle] = $quantite;
    };
    session(['panier' => $panier]);
    if( null !== session("panier")[$idArticle] ) {
      return session("panier");
    }else{
      return false;
    }
  }

  /**
   * le contenu du panier.
   *
   * @return array le contenu du panier
   */
  public static function get( ){
    if( null !== session("panier") ) {
      return session("panier");
    }else{
      return false;
    }
  }

  /**
   * Compte le nombre d'article du panier.
   *
   * @return integer
   */
  public static function panierCount()
  {
    if( null !== session("panier") )  {
      return array_sum(session("panier"));
    }else{
      return 0;
    }
  }

  /**
   * modifier le nombre d'article du panier.
   *
   * @return
   * si ok : le contenu du panier
   * si erreur:  false
   */
  public static function modifier(int $idArticle  ,int $quantite ){
    $panier=session("panier");
    if( isset($panier[$idArticle]) ) {
      $panier[$idArticle] = $quantite;
    };
    session(['panier' => $panier]);
    if( null !== session("panier")[$idArticle] ) {
      return session("panier");
    }else{
      return false;
    }
  }


  /**
   * Vide le panier.
   *
   * @return void
   */
  public static function supprimer($idArticle)
  {
    $panier=session("panier");
    unset($panier[$idArticle]);
    session(['panier' => $panier]);
    return session("panier");
  }

  /**
   * Vide le panier.
   *
   * @return void
   */
  public static function vider()
  {
    session()->forget('panier');
  }
}
