<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use App\adresse;
use App\Article;
use App\CatalogueProduits;
use App\commande;
use App\Http\Requests\ValiderPrixRequest;
use App\Http\Requests\ModifierPrixRequest;
use App\Notifications;

class AdminController extends Controller
{

// affiche la liste des clients
    public function listeClients(){
      //vérifi si admin
      if( utilisateur::getMyRole( session("UserId") ) != "administrateur"){
        return redirect()->route('login');
      }
      $listeClients=utilisateur::all();
      return view('admin/client/liste')
        ->with('listeClients',$listeClients);
    }

// affiche les informations du clients et son catalogue de produits
    public function detailClient($idClient){
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $Client=utilisateur::find($idClient);
      $listeProduits = Article::getCatalogue($idClient);
      $listeCommande = commande::getListe($idClient);
      session(["idClient"=>$idClient]);
      return view('admin/client/detail')
        ->with('client',$Client)
        ->with('listeCommande',$listeCommande)
        ->with('listeProduits',$listeProduits);
    }

// affiche la liste de tout les produits pour choisir les prix
    public function validerClient($idClient){
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $Client=utilisateur::find($idClient);
      $ListeProduits=Article::all();
      session(["idClient"=>$idClient]);
      //dd($ListeProduits);
      return view('admin/client/valider')
        ->with('client',$Client)
        ->with('listeProduits',$ListeProduits);
    }

// enregistre les prix dans le catalogue client
    public function validerPrix(ValiderPrixRequest $request){
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $idClient = session("idClient");
      $validated = $request->validated();
// enregistre le catalogue des prix
      foreach ($validated["prix"] as $id => $prix) {
        if( $prix >= 0 && $prix !== null){
          //echo "$id : $prix<br>";
          $produit = new CatalogueProduits;
          $produit->prix = $prix;
          $produit->produit_id = $id;
          $produit->users_id = $idClient;
          $produit->save();
        }
      }
//modifi les info client
      $user = utilisateur::find($idClient);
      $user->role="client";
      $user->login= $validated["loginClient"];
      $user->siret= $validated["Siret"];
      $user->password= password_hash( $validated["mdpClient"] , PASSWORD_DEFAULT );
      $user->save();
// adresse facturation
      $adresseContact = adresse::where("users_id" , $idClient)->first();
      $adresseFacturation = new adresse;
      $adresseFacturation->type = "facturation";
      $adresseFacturation->users_id = $idClient;
      $adresseFacturation->adresse = $adresseContact->adresse;
      $adresseFacturation->codePostal = $adresseContact->codePostal;
      $adresseFacturation->ville = $adresseContact->ville;
      $adresseFacturation->save();
      // envoi d'e-mail
/*
      Notification::route('mail', $user->email)
            ->notify(
              (new MailMessage)
                ->greeting('Bonjour!')
                ->line('Votre compte à été activé!')
                ->line('Votre identifiant : '.$user->login )
                ->line('Votre mot de passe : '.$validated["mdpClient"] )
                ->action('Vous connecter', URL::route('login') )
                ->line('Merci de commander chez nous.')
              );
*/
      return $this->detailClient($idClient);
    }

// modifier les prix dans le catalogue client
    public function modifierPrix(ModifierPrixRequest $request){
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $idClient = session("idClient");
      $validated = $request->validated();
      foreach ($validated["prix"] as $id => $prix) {
        if( $prix >= 0 && $prix !== null){
          CatalogueProduits::where('users_id', $idClient)
            ->where("produit_id", $id)
            ->update(["prix"=>$prix]);
        }
      }
      return $this->detailClient($idClient);
    }
}
