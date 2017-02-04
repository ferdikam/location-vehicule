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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/marque', 'MarqueController@index');
Route::post('/marque', 'MarqueController@store');

Route::get('/modele', 'ModeleController@index');
Route::post('/modele', 'ModeleController@store');

Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');

Route::get('/vehicule', 'VehiculeController@index');
Route::post('/vehicule', 'VehiculeController@store');
