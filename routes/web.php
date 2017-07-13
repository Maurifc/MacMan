<?php
Route::get('/', function () {
    return view('index');
});

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');

/*
* Auth
*/
Route::prefix('auth')->group(function () {
  Route::post('/login', 'AuthController@login')->name('login');
  Route::get('/status', 'AuthController@status')->name('status');
  Route::post('/logout', 'AuthController@logout')->name('logout');
});


/*
* API
*/
Route::prefix('api')->group(function(){
  Route::resource('clientes', 'Api\ClienteController');
  Route::resource('licencas', 'Api\LicencaController');
  Route::resource('computadores', 'Api\ComputadorController');
});
