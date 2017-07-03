<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
* API
*/
//Cliente
Route::prefix('api')->group(function(){
  Route::resource('clientes', 'Api\ClienteController');
  Route::resource('licencas', 'Api\LicencaController');
  Route::resource('computadores', 'Api\ComputadorController');
});
