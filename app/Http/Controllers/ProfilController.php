<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utilisateur;

class ProfilController extends Controller
{
    public function index()
    {
        $Client=utilisateur::find(session("UserId"));
        return view('profil.index')->with('client',$Client);
    }

    public function modifier(Request $request)
    {

    }
}
