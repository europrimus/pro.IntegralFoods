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


// Utilisateurs
Route::get('/', function () { return view('auth/login'); });
Route::get('/preinscription', function () { return view('auth/preinscription'); });
Route::get('/inscription', function () { return view('auth/login'); });
//Route::get('/monCompte', function () { return view('auth/compte'); })->name("monCompte");
Route::get('/monCompte','commandeController@index' )->name("monCompte");

Route::resource('preinscription', 'PreinscriptionController');
Route::post('/preinscription', 'PreinscriptionController@store');

Route::resource('co', 'CoController');
Route::post('/co', 'CoController@check');

Auth::routes();

// panier
Route::prefix('/panier')->group(function () {
  Route::get('/', 'PanierController@index' )
    ->name("panier");
  Route::get('/ajouter/{idArticle}x{quantite}', 'PanierController@store' )
    ->where('idArticle','[0-9]+')
    ->where('quantite','[0-9]+');
  Route::get('/modifier/{idArticle}x{quantite}', 'PanierController@update' )
    ->where('idArticle','[0-9]+')
    ->where('quantite','[0-9]+');

  Route::get('/supprimer/{idArticle}','PanierController@supprimer' )
    ->where('idArticle','[0-9]+');
  Route::get('/toutSupprimer', 'PanierController@destroy' );
});
//Route::get('/commandes',  'commandeController@index');
//Route::get('/commandes/{n}', 'commandeController@show')->where('id','[0-9]+');
Route::resource('commande', 'commandeController');
Route::post('/commande',  'commandeController@store');


Route::resource('produits','ArticleController');

Route::resource('produitsclient','ArticleClientController');

// espace d'administration
Route::prefix('/admin')->group(function () {
  Route::prefix('/client')->group(function () {
    Route::get('liste','AdminController@listeClients')
      ->name('admin.client.liste');
    Route::get('details/{idClient}','AdminController@detailClient')->where('idClient','[0-9]+')
      ->name('admin.client.details');
    Route::get('valider/{idClient}','AdminController@validerClient')->where('idClient','[0-9]+')
      ->name('admin.client.valider');
    Route::post('valider','AdminController@validerPrix')
      ->name('admin.client.validerPrix');
    Route::post('modifierPrix','AdminController@modifierPrix')
      ->name('admin.client.modifierPrix');
    Route::get('{idClient}/commande/{idCommande}','AdminController@commandeClientView')
      ->where('idClient','[0-9]+')
      ->where('idCommande','.*')
      ->name('admin.client.commande.show');  });
});

Route::resource('profil','ProfilController');

Route::get('deco','ProfilController@deco')->name('deco');
