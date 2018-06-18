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

// créer une commande
  public function new($request){
    // on verifie la commande
    // déjà fait coté Controller

    // on l'enregistre dans un array
    $commande = $this->infoGeneral;
    // numéro de commande
    $numCommande = date("Y-m-d")."_".str_pad(dechex(mt_rand()), 8, "0", STR_PAD_LEFT);
    // identification client
    $idClient = session("UserId");
    $commande["idClient"]=$idClient;

    // les produits
    array_push($commande, $request);

    // on créer le xml de la commande
    //$xml = new SimpleXMLElement("<xml/>");
    $xml=$this->array2xml($commande, new \SimpleXMLElement('<commande/>'));

    Storage::put("commandes/".$idClient."/".$numCommande.".xml", $xml->saveXML());
    return $numCommande;
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
      $ListeFacture[]=["date"=>$found[1],"facture"=>$found[0]];
    }
    //dd($ListeFacture);
    return $ListeFacture;
  }
}
