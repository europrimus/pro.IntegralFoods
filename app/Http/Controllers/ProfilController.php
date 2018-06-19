<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index()
    {
        $Client=utilisateur::find(session("UserId"));
        return view('profil.index')->with('client',$Client);
    }

    public function store(Request $request)
    {
        $utilisateur = \App\utilisateur::find(2);
        $utilisateur->nom = $request->nom;
        $utilisateur->civilite = $request->civilite;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->email = $request->email;
        $utilisateur->tel = $request->tel;
        $utilisateur->save();

		
		return $this->index();
	}
}
