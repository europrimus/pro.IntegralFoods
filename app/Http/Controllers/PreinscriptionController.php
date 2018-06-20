<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\inscriptionRequest;

class PreinscriptionController extends Controller
{



    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function index()
    {
		return view('auth/preinscription');
	}

	public function create()
    {
	}


    public function store(inscriptionRequest $request)
    {


		DB::table('utilisateur')->insert([
			'civilite'=> $request->civilite,
			'nom' => $request->nom,
			'prenom' => $request->prenom,
			'entreprise' => $request->entreprise,
			'etablissement'=> $request->etablissement,
			'etabliementautre'=> $request->etablissementautre,
			'tel' => str_pad($request->tel, 10, "0", STR_PAD_LEFT),
			'email' => $request->email,
			'siret' => 'FAKE_NUMBER_'.str_random(20),
			'kbis' => '',
			'login' => '',
			'password' => '',
			'commentaire' => $request->commentaire,
			'role' => 'inscription en attente',
		]);
		$id = DB::select('select id from utilisateur where email = ?', array($request->email));
		//print_r($id);
		DB::table('adresse')->insert([
			'adresse'=>$request->adresse,
			'codePostal'=>$request->codePostal,
			'ville'=>$request->ville,
			'type'=>'contact',
			'users_id' => $id[0]->id,
		]);
		
		$msg = "Votre demande d'inscription a bien été enregistrée, ".$request->civilite." ".$request->prenom." ".$request->nom.". Nous vous contacterons pour la suite de la procédure. Bonne journée.<br><br>Ce message a été envoyé par un programme, merci de ne pas y répondre.";
		$headers = "From: ne_pas_repondre@integralfoods.fr".PHP_EOL;
		$headers .='Content-Type: text/html; charset="UTF-8"'.PHP_EOL;
		$headers .='Content-Transfer-Encoding: 8bit'.PHP_EOL;
		
		mail($request->email,"Confirmation de demande d'inscripiton",$msg,$headers);
		
		$msg = "".$request->civilite." ".$request->prenom." ".$request->nom." vient d'effectuer une demande d'inscription.";
		mail("labrigade@integralfoods.fr", "Demande d'inscription", $msg,$headers);
		
		return view('auth/preinscriptionAttente');
		
		$validation->validated();
	}


}
