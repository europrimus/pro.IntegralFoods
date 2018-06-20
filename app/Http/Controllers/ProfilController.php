<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function index($message="")
    {
        //vérifi si client
        if( utilisateur::getMyRole( session("UserId") ) != "client"){
          return redirect()->route('login');
        }
        $Client=utilisateur::find(session("UserId"));
        return view('profil.index')->with('client',$Client)
         ->with('message',$message);
    }

    public function store(Request $request)
    {
        //vérifi si client
        if( utilisateur::getMyRole( session("UserId") ) != "client"){
          return redirect()->route('login');
        }
        $utilisateur = \App\utilisateur::find(session("UserId"));
        $utilisateur->nom = $request->nom;
        $utilisateur->civilite = $request->civilite;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->email = $request->email;
        $utilisateur->tel = $request->tel;
        $utilisateur->save();


		return $this->index("Modification éffectué");
    }

    public function deco(){
        session()->flush();
        return redirect()->route('login');
    }
}
