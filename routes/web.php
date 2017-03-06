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

Route::get('/', 'HomeController@index');

Route::get('/events', 'HomeController@getEvents');

Route::get('/operationEvents', 'HomeController@getOperations');

Route::get('/utilisateur/confirm/{id}/{token}', 'UserController@confirm');
Route::get('/utilisateur/envoie-lien', 'UserController@send');
Route::post('/utilisateur/envoie-lien', 'UserController@sendLink');

Auth::routes();

Route::get('/login', 'SessionController@create')->name('login');
Route::get('/logout', 'SessionController@destroy');
Route::get('/forgot-password', 'SessionController@recovery');
Route::post('/login', 'SessionController@store');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/marque', 'MarqueController@index');
	Route::post('/marque', 'MarqueController@store');

	Route::get('/modele', 'ModeleController@index');
	Route::post('/modele', 'ModeleController@store');

	Route::get('/category', 'CategoryController@index');
	Route::post('/category', 'CategoryController@store');

	Route::get('/vehicule', 'VehiculeController@index');
	Route::post('/vehicule', 'VehiculeController@store');
	Route::patch('/edit/{id}/vehicule', 'VehiculeController@update');
	Route::delete('/vehicule/{id}/delete', 'VehiculeController@destroy');

	Route::get('/operation', 'OperationController@index');
	Route::post('/operation', 'OperationController@store');
	Route::post('/operation_validated', 'OperationController@validated');

	Route::get('/type_operation', 'TypeOperationController@index');
	Route::post('/type_operation', 'TypeOperationController@store');

	Route::get('/fournisseur', 'FournisseurController@index');
	Route::post('/fournisseur', 'FournisseurController@store');

	Route::get('/utilisateur', 'UserController@index');
	
	
	Route::get('/utilisateur/active/{id}', 'UserController@active');
	Route::post('/registration', 'UserController@store');
	Route::get('/profile', 'UserController@profile');
	Route::post('/profile', 'UserController@setProfile');

	Route::get('/client', 'ClientController@index');
	Route::post('/client', 'ClientController@store');
	Route::patch('/edit/{id}/client', 'ClientController@update');

	Route::get('/location', 'LocationController@index');
	Route::get('/location/{id}', 'LocationController@show');
	Route::get('/location/statut/{id}', 'LocationController@statut');
	Route::post('/location', 'LocationController@store');

	Route::get('/invoice', 'InvoiceController@index');
});
Route::get('/home', 'HomeController@index')->name('home');

