<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;

class AdminController extends Controller
{
    public function listeClients(){
      $listeClients=utilisateur::all();
      return view('admin/client/liste')
        ->with('listeClients',$listeClients);
    }

    public function detailClient($idClient){
      $Client=utilisateur::find($idClient);
      return view('admin/client/detail')
        ->with('client',$Client);
    }

    public function validerClient($idClient){
      $Client=utilisateur::find($idClient);
      return view('admin/client/valider')
        ->with('client',$Client);
    }
}
