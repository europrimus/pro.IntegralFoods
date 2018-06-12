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
Route::get('/inscription', function () { return view('auth/register'); });
Route::get('/monCompte', function () { return view('auth/compte'); });
Auth::routes();

// produits
Route::get('/produits', function () { return view('produit/index'); });

// commandes
Route::get('/panier',     'commandeController@create' );
//Route::get('/commandes',  'commandeController@index');
//Route::get('/commandes/{n}', 'commandeController@show')->where('id','[0-9]+');
Route::resource('commande', 'commandeController');

Route::resource('articles','ArticleController');
