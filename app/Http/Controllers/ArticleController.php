<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
         return view('articles.create');
    }


    public function store(NouvelleArticleRequest $request)
    {
        Article::create($request->all());
        $request->photo->storeAs('public/photo',$request->reference.".".$request->photo->extension());
        return redirect()->route('produits.index')
                        ->with('success','Article created successfully');
        
    }


    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',compact('article'));
    }


    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',compact('article'));
    }


    public function update(Request $request, $id)
    {
        request()->validate([
            'titre' => 'required',
            'description' => 'required',
        ]);
        Article::find($id)->update($request->all());
        return redirect()->route('produits.index')
                        ->with('success','Article updated successfully');
    }


    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->route('produits.index')
                        ->with('success','Article deleted successfully');
    }

}
