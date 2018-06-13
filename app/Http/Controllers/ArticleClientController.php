<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleClientController extends Controller
{
    public function index()
    {    
        $articleclients = Article::all();
        return view('articlesclients/indexclient',compact('articleclients'));
    }

    public function show()
    {

    }

    public function ajoutboutique()
    {
        
    }
}
