<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleClientController extends Controller
{
    public function index()
    {
        // client identifié
        //$idClient = session("idClient");
        $idClient = 2;
        //$articleclients = Article::all();
        $articleclients = Article::getCatalogue($idClient);
        return view('articlesclients/indexclient',compact('articleclients'));
    }

}
