<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Panier;
use App\Article;
use App\commande;
use App\CatalogueProduits;
use App\adresse;
use App\utilisateur;
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

      $lignes=[];
      $prixTotal=0;
      if($panier){
        foreach ($panier as $id => $quantitie) {
          if( isset($produits[$id]) && $quantitie >> 0 ){
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

      // les adresses de livraisons
      // SELECT * FROM `adresse` WHERE `users_id` = 2 AND `type` = 'livraison'
      $adresses = adresse::where('users_id', $idClient)
        //->where('type', "=", 'livraison' )
        ->where('type', "!=", 'contact' )
        ->get();
      $adresseFacturation = adresse::where('users_id', $idClient)
        ->where('type', 'facturation')
        ->first();

      // on affiche le panier
      return view( 'commande/create' )
        ->with('lignes', $lignes)
        ->with('prixTotal', $prixTotal)
        ->with('adresses', $adresses)
        ->with('adresseFacturation', $adresseFacturation);
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
        //dd($valid["quantity"]);
        foreach( $valid["quantity"] as $quantity ){
          if($quantity<=0){
            return view('commande.erreurs')
              ->with('erreurs', ["Quantité invalide"] );
          }
        }
// nouvelle adresse
        if( $valid["adresseLivraison"] == "nouvelleAdresse" ){
          $adresse = new adresse;
          $adresse->users_id = session("UserId");
          $adresse->adresse = $valid["adresse"];
          $adresse->codePostal = $valid["codePostal"];
          $adresse->ville = $valid["ville"];
          $adresse->save();
          $valid["adresseLivraison"] = $adresse->id;
        };
        $commandeObj = new commande;
        $id = $commandeObj->new($valid);
        if(is_array($id)){
          return view('commande.erreurs')->with('erreurs', $id);
        }else{
          // on récupère les info d'administrateur
          $administrateur = utilisateur::find(1);

          // on envois un mail
          $msg = 'Bonjour,<br>'.PHP_EOL.
'Nouvelle commande : <a href="'.route('admin.client.commande.show', ["idCommande"=> $id, "idClient"=>session("UserId") ] ).'">'.$id.'</a>';
          $headers = "From: ne_pas_repondre@integralfoods.fr".PHP_EOL;
          $headers .='Content-Type: text/html; charset="UTF-8"'.PHP_EOL;
          $headers .='Content-Transfer-Encoding: 8bit'.PHP_EOL;

          mail("<".$administrateur["email"].">".$administrateur["entreprise"],"Nouvelle commande",$msg,$headers);
          // on affiche la commande
          return $this->show($id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCommande)
    {
        $idClient = session("UserId");
        $commande= commande::getCommande($idClient, $idCommande);
        return view( 'commande/show' )
          ->with('id', $idCommande)
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
