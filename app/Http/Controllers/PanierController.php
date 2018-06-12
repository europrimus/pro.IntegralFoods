<?php

namespace App\Http\Controllers;

use App\Panier;
use Illuminate\Http\Request;
use App\Http\Controllers\commandeController;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commande= new commandeController;
        return $commande->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $idArticle ,$quantite )
    {
        $panierObj = new panier;
        $panierObj->ajouter( $idArticle, $quantite );
        $message = "Article ajouté au panier";
        return response()->json([
          'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $idArticle, $quantite
     * @return \Illuminate\Http\Response
     */
    public function update( $idArticle, $quantite )
    {
      $panierObj = new panier;
      $panierObj->modifier( $idArticle, $quantite );
      return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int id de l'article
     * @return \Illuminate\Http\Response
     */
    public function supprimer( $idArticle )
    {
      $panierObj = new panier;
      $panierObj->supprimer( $idArticle );
      return $this->index();
    }

    /**
     * Supprime tout le panier.
     *
     * @param  \App\Panier  $panier
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
      $panierObj = new panier;
      $panierObj->vider();
      return redirect()->action('PanierController@index');
    }
}
