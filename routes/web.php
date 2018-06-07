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

Route::get('/', function () { return view('auth/login'); });

Auth::routes();

Route::get('/inscription', function () { return view('auth/register'); });
Route::get('/produits', function () { return view('produit/index'); });
Route::get('/panier', function () { return view('panier'); });
Route::get('/monCompte', function () { return view('auth/compte'); });
