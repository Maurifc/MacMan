<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
* API
*/
Route::prefix('api')->group(function(){
  Route::resource('clientes', 'Api\ClienteController');
});
