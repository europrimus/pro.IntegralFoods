<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\utilisateur;
use App\CatalogueProduits;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NouvelleArticleRequest;


class ArticleController extends Controller
{

    public function index()
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $articles = Article::latest()->paginate(5);
      return view('articles.index',compact('articles'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $article =["titre"=>"", "description"=>"", "reference"=>"", "ean"=>"376028145"];
     return view('articles.create',compact('article'));
    }


    public function store(NouvelleArticleRequest $request)
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      Article::create($request->all());
      $request->photo->storeAs('public/photo',$request->reference.".".$request->photo->extension());
      return redirect()->route('produits.index')
                        ->with('success','Article crée');

    }


    public function show($id)
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $article = Article::find($id);
      return view('articles.show',compact('article'));
    }


    public function edit($id)
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      $article = Article::find($id);
      return view('articles.edit',compact('article'));
    }


    public function update(Request $request, $id)
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
      request()->validate([
          'titre' => 'required',
          'description' => 'required',
          'ean' => 'required',
          'reference' => 'required',
      ]);
      Article::find($id)->update($request->all());
      return redirect()->route('produits.index')
                        ->with('success','Article modifier');
    }


    public function destroy($id)
    {
      //vérifi si admin
      if(utilisateur::getMyRole(session("UserId")) != "administrateur"){
        return redirect()->route('login');
      }
// on regarde si le produit est dans un catalogue client
      if( CatalogueProduits::where('produit_id', $id)->count() > 0 )
// si oui on redirige vers un message erreur
        {
        $message = 'Imposssible de supprimer l\'article car il fait partie du catalogue d\'un client.';
        }
// si non on supprimie
      else{
        Article::find($id)->delete();
        $message = 'Article supprimer';
      }
      return redirect()->route('produits.index')
                       ->with('success',$message);
    }

}
