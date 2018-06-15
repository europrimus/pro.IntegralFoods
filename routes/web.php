<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// un id de client fictif
session(["idClient"=>2]);

// Utilisateurs
Route::get('/', function () { return view('auth/login'); });
Route::get('/preinscription', function () { return view('auth/preinscription'); });
Route::get('/inscription', function () { return view('auth/login'); });
//Route::get('/monCompte', function () { return view('auth/compte'); })->name("monCompte");
Route::get('/monCompte','commandeController@index' )->name("monCompte");

Route::resource('preinscription', 'PreinscriptionController');
Route::post('preinscription', 'PreinscriptionController@store');

Auth::routes();

// panier
Route::prefix('/panier')->group(function () {
  Route::get('/',                         'PanierController@index' )
    ->name("panier");
  Route::get('/ajouter/{idArticle}x{quantite}', 'PanierController@store' )
    ->where('idArticle','[0-9]+')
    ->where('quantite','[0-9]+');
  Route::get('/modifier/{idArticle}x{quantite}', 'PanierController@update' )
    ->where('idArticle','[0-9]+')
    ->where('quantite','[0-9]+');

  Route::get('/supprimer/{idArticle}',    'PanierController@supprimer' )
    ->where('idArticle','[0-9]+');
  Route::get('/toutSupprimer',            'PanierController@destroy' );
});
//Route::get('/commandes',  'commandeController@index');
//Route::get('/commandes/{n}', 'commandeController@show')->where('id','[0-9]+');
Route::resource('commande', 'commandeController');
Route::post('/commande',  'commandeController@store');


Route::resource('produits','ArticleController');

Route::resource('produitsclient','ArticleClientController');
