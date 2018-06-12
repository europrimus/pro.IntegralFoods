<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panier;

class commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'commande/index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // on récupère le contenu du panier de la session
      $panierObj = new Panier;
      $panier = $panierObj->get();

      // on charge la liste des produits (nom, prix, ..)
      $produits = [
        "2"=>["nom"=>"Paprika","prix"=>"15.25"],
        "4"=>["nom"=>"Mousse","prix"=>"10.50"],
        "1"=>["nom"=>"prod1","prix"=>"1.50"],
      ];

      $lignes=[];
      if($panier){
        foreach ($panier as $id => $quantitie) {
          if( isset($produits[$id]) ){
            $lignes[]=[
              "id"=>$id,
              "img"=>@$produits[$id]["img"],
              "produit"=>$produits[$id]["nom"],
              "prix"=>$produits[$id]["prix"],
              "Quantité"=>$quantitie,
            ];
          };
        }
      };
      // on affiche le panier
      return view( 'commande/create' )->with('lignes', $lignes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // on verifie la commande
        // on l'enregistre
        // on affiche la commande
        $this->show($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commande=array();
        return view( 'commande/show' )->with('commande', $commande);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // si la commande n'est pas expédié
        // on peu la modidier
        return view( 'commande/edit' );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // si la commande n'est pas expédié
      // on enregistre les modidification
      $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // si la commande n'est pas expédier
        // on annule la commande
    }

}
