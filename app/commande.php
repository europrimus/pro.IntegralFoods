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

  public function new($request){
    // on verifie la commande
    $requeteValide = $request->validated();

    // on l'enregistre dans un array
    $commande = $this->infoGeneral;
    // numéro de commande
    $numCommande = date("Y-m-d")."_".str_pad(dechex(mt_rand()), 8, "0", STR_PAD_LEFT);
    // identification client
    $idClient = "12345";
    $commande["idClient"]=$idClient;

    // les produits
    array_push($commande, $requeteValide);

    // on créer le xml de la commande
    //$xml = new SimpleXMLElement("<xml/>");
    $xml=$this->array2xml($commande, new \SimpleXMLElement('<commande/>'));

    Storage::put("commandes/".$idClient."/".$numCommande.".xml", $xml->saveXML());
    return $numCommande;
  }

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

  public function getListe(){
    // identification client
    $idClient = "12345";
    $ListeFacture = Storage::files("commandes/".$idClient."/");
    return $ListeFacture;
  }
}
