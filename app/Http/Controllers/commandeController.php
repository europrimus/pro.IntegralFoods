<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panier;
use App\Article;
use App\Http\Requests\NouvelleCommandeRequest;

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
     * Formulaire de commande.
     * Correspond à la validation du panier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // on récupère le contenu du panier de la session
      $panierObj = new Panier;
      $panier = $panierObj->get();

      // on charge la liste des produits (nom, prix, ..)
      $produits = Article::all();
      //dd($produits);

      // données fictives
      $produits = [
        "2"=>["nom"=>"Paprika","prix"=>"15.25"],
        "4"=>["nom"=>"Mousse","prix"=>"10.50"],
        "1"=>["nom"=>"prod1","prix"=>"1.50"],
      ];

      $adresses = [
        "1"=>["adresse"=>"9 rue du Meh","codePostal"=>"21000","ville"=>"Dijon","nom"=>"Magasin Dijon"],
        "2"=>["adresse"=>"2 rue du Arrgg","codePostal"=>"21110","ville"=>"Genlis","nom"=>"Resto Genlis"],
        "3"=>["adresse"=>"3 rue SadiCarnot","codePostal"=>"21600","ville"=>"Longvic","nom"=>"Epicerie Longvic"],

      ];
      $lignes=[];
      $prixTotal=0;
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
            $prixTotal+=$produits[$id]["prix"]*$quantitie;
          };
        }
      };
      // on affiche le panier
      return view( 'commande/create' )
        ->with('lignes', $lignes)
        ->with('prixTotal', $prixTotal)
        ->with('adresses', $adresses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NouvelleCommandeRequest $request)
    {
        // on envois la commande au model
        $commande = new NouvelleCommande;
        $id = $commande->new($request);
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
