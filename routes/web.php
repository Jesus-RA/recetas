<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'InicioController@index')->name('inicio.index');

Route::resource('/recetas', 'RecetaController');

// Recipes searcher
Route::get('/buscar', 'RecetaController@search')->name('search.show');

// Stores the likes of the recipes
Route::post('/recetas/{receta}', 'LikesController@update')->name('likes.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('perfils', 'PerfilController')->except(['index', 'create', 'store']);

Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');