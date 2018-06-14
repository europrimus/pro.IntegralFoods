<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use Illuminate\Support\Facades\DB;

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
    
    
    public function store(Request $request)
    {
		
		
	DB::table('utilisateur')->insert([
		'civilite'=> $request->civilite,
		'nom' => $request->nom,
		'prenom' => $request->prenom,
		'entreprise' => $request->entreprise,
		'etablissement'=> $request->etablissement,
		'tel' => $request->tel,
		'email' => $request->email,
		'siret' => '',
		'kbis' => '',
		'login' => '',
		'password' => bcrypt(''),
		'commentaire' => $request->commentaire,
		'role' => 'inscription en attente',
	]);
	$id = DB::select('select id from utilisateur where email = ?', array($request->email));
	//print_r($id);
	DB::table('adresse')->insert([
		'adresse'=>$request->adresse,
		'code postal'=>$request->codePostal,
		'ville'=>$request->ville,
		'type'=>'contact',
		'users_id' => $id[0]->id,
	]);
		
	}
}
