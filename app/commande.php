<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class commande extends Model
{
  // nom de la table
  protected $table = 'commande';

  protected $infoGeneral = [
      "codeClient" => "226",
      "typeBoutique" => "0",
      "codeBoutique" => "pro.IntegralFoods",
      "Entreprise" => "SAS INTEGRAL FOODS",
      "Siret" => "799 852 934",
      "TVA" => "FR71 799 852 934",
      "email" => "contact@integralfoods.fr",
      "Tel" => "09 72 62 67 18",
      "Adresse" => [
        "Adresse"=>"64 E RUE SULLY, HOPE",
        "CodePostal"=>"21000",
        "Ville"=>"Dijon",
        ],
    ];

  /**
   * liste des attributs renseignable
   *
   * @var array
   */
  protected $fillable = [
      'quantity',
      'adresseLivraison',
      'adresseFacturation',
  ];

  public function __construct(){
    // on récupère les info d'administrateur
    $administrateur = utilisateur::find(1);

    $this->infoGeneral["Entreprise"] = $administrateur["entreprise"];
    $this->infoGeneral["Siret"] = $administrateur["siret"];
    $this->infoGeneral["email"] = $administrateur["email"];
    $this->infoGeneral["Tel"] = $administrateur["tel"];

    // on récupère l'adresse
    $adresseAdmin = adresse::where('users_id', 1)
        ->where('type',"contact")->first();
    $this->infoGeneral["Adresse"]["Adresse"] = $adresseAdmin['adresse'];
    $this->infoGeneral["Adresse"]["CodePostal"] = $adresseAdmin["codePostal"];
    $this->infoGeneral["Adresse"]["Ville"] = $adresseAdmin["ville"];
  }

// créer une commande
  public function new($request){
    // on verifie la commande
    // déjà fait coté Controller

    // on l'enregistre dans un array
    $commande["Fournisseur"] = $this->infoGeneral;
    // numéro de commande
    $numCommande = date("Y-m-d")."_".str_pad(dechex(mt_rand()), 8, "0", STR_PAD_LEFT);
    $commande["commande"]=[
        "NumCommande"=>$numCommande,
        "Date"=>date("d/m/Y"),
      ];
// identification client
    $idClient = session("UserId");
    $client = utilisateur::find($idClient);
    /*
"id" => 4
"civilite" => "Madame"
"nom" => "Madame"
"prenom" => "Mlle"
"entreprise" => "Madame"
"etablissement" => "collectivité"
"etabliementautre" => null
"role" => "client"
"tel" => 8
"email" => "mde@fille.com"
"siret" => "FAKE_NUMBER_hamB4uw8z3kk28RjBqoY"
    */
    if(strstr ( $client["siret"] , "FAKE_NUMBER" ) ){
      $errors[]="Numéro de siret invalide";
    }

//adresses
    $adresseFacturation = adresse::where('users_id', $idClient)
        ->where('type',"facturation")->first();
    if(empty($adresseFacturation)){
      $errors[]="Pas d'adresse de facturation";
    }

    $adresseLivraison = adresse::find($request["adresseLivraison"]);
    if(empty($adresseLivraison)){
      $errors[]="Pas d'adresse de livraison";
    }

    //les infos de la commande
    $commande["Client"]=[
        "id"=>$idClient,
        "Civilite"=>$client["civilite"],
        "Nom"=>$client["nom"],
        "Prenom"=>$client["prenom"],
        "Entreprise"=>$client["entreprise"],
        "Telephone"=>$client["tel"],
        "email"=>$client["email"],
        "Siret"=>$client["siret"],
        "Facturation"=>[
          "Adresse"=>$adresseFacturation["adresse"],
          "CodePostal"=>$adresseFacturation["codePostal"],
          "Ville"=>$adresseFacturation["ville"],
        ],
        "Livraison"=>[
          "Adresse"=>$adresseLivraison["adresse"],
          "CodePostal"=>$adresseLivraison["codePostal"],
          "Ville"=>$adresseLivraison["ville"],
        ]
      ];


    // le catalogue
    $catalogue = Article::getCatalogue($idClient);
//dd($catalogue);
/*
+"catalogue_id": 8
+"produit_id": 2
  +"prix": 4.99
  +"ean": "0002137942156"
  +"nom": "Paprika doux AOP"
+"description":
  +"reference
*/


    // les produits
    $xml=$this->array2xml($commande, new \SimpleXMLElement('<commande/>'));
// on ajoute les produits
    $PrixTotalCommande=0;
    foreach ($request["quantity"] as $idCatalogue => $quantite) {
      $article=[
        "Nom"=>$catalogue[$idCatalogue]->nom,
        "Reference"=>$catalogue[$idCatalogue]->reference,
        "ean"=>$catalogue[$idCatalogue]->ean,
        "Quantite"=>$quantite,
        "PrixUnitaire"=>$catalogue[$idCatalogue]->prix,
        "PrixTotal"=>$catalogue[$idCatalogue]->prix * $quantite,
      ];
      $PrixTotalCommande+=$article["PrixTotal"];
      $subxml = $this->array2xml( $article, $xml->addChild("produits") );
    }

    $xml->commande->addChild("PrixTotal", $PrixTotalCommande);
    // status
    $xml->addChild("Status", "en cours de traitement");

    // on créer le xml de la commande
    if(empty($errors)){
      session()->forget('panier');
      Storage::put("commandes/".$idClient."/".$numCommande.".xml", $xml->saveXML());
      return $numCommande;
    }else{
      return $errors;
    }
  }

// converti un un tableau en XML
  private function array2xml( array $arr, \SimpleXMLElement $xml){
    foreach ($arr as $k => $v) {
      if( is_array($v) ){
        $this->array2xml($v, $xml->addChild($k));
      }else{
        $xml->addChild($k, $v);
      }
    }
    return $xml;
  }

// affiche la liste des commandes
  public static function getListe($idClient){
    $data = Storage::files("commandes/".$idClient."/");
    $ListeFacture=[];
    foreach($data as $val){
      //commandes/2/2018-06-14_3e71b8f7.xml
      preg_match( '/(.*)_(.*)/' , basename( $val, ".xml" ), $found  );
      $ListeFacture[]=["date"=>$found[1],"numCommande"=>$found[0]];
    }
    return $ListeFacture;
  }

// affiche la commande
  public static function getCommande($idClient, $idCommande){
    $string = Storage::get("commandes/".$idClient."/".$idCommande.".xml");
    //$xml = new \SimpleXMLElement($string);  //String could not be parsed as XML
    $xml = simplexml_load_string($string);
    return $xml;
  }
}
