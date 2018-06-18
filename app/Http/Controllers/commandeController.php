<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panier;
use App\Article;
use App\commande;
use App\CatalogueProduits;
use App\adresse;
use App\Http\Requests\NouvelleCommandeRequest;
use Illuminate\Support\Facades\DB;

class commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $idClient = session("UserId");
      $listeCommande = commande::getListe($idClient);
      return view( 'commande/index' )
        ->with('listeCommande', $listeCommande);
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
      $panier = Panier::get();

      // on recupère l'idClient dans la session
      $idClient = session("UserId");

      $produits = Article::getCatalogue($idClient);

      // données fictives
/*
      $produits = [
        "2"=>["nom"=>"Paprika","prix"=>"15.25"],
        "4"=>["nom"=>"Mousse","prix"=>"10.50"],
        "1"=>["nom"=>"prod1","prix"=>"1.50"],
      ];
*/
      $lignes=[];
      $prixTotal=0;
      if($panier){
        foreach ($panier as $id => $quantitie) {
          if( isset($produits[$id]) ){
            $lignes[]=[
              "catalogue_id"=>$id,
              "produit_id"=>$produits[$id]->produit_id,
              "prix"=>$produits[$id]->prix,
              "ean"=>$produits[$id]->ean,
              "produit"=>$produits[$id]->nom,
              "description"=>$produits[$id]->description,
              "reference"=>$produits[$id]->reference,
              "Quantité"=>$quantitie,
            ];
            $prixTotal+=$produits[$id]->prix*$quantitie;
          };
        }
      };
      //dd($lignes);

      // les adresses de livraisons
      // données fictives
      // SELECT * FROM `adresse` WHERE `users_id` = 2 AND `type` = 'livraison'
      $adresses = DB::table('adresse')
        ->where('users_id', $idClient)
        ->where('type', 'livraison')
        ->get();
      //dd($adresses);

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
        $valid = $request->validated();
        //dd($valid);
        if( $valid["adresseLivraison"] == "nouvelleAdresse" ){
          $adresse = new adresse;
          $adresse->users_id = session("UserId");
          $adresse->adresse = $valid["adresse"];
          $adresse->codePostal = $valid["codePostal"];
          $adresse->ville = $valid["ville"];
          $adresse->save();
        }
        $commandeObj = new commande;
        $id = $commandeObj->new($valid);
        // on affiche la commande
        return $this->show($id);
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
        return view( 'commande/show' )
          ->with('id', $id)
          ->with('commande', $commande);
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
