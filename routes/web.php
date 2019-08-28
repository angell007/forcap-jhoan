<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Capacitaciones
Route::resource('/capacitaciones', 'CapacitacionController');
Route::get('/capacitacion/asistentes/', 'CapacitacionController@asistentes');

//Empresarios
Route::resource('/empresarios', 'EmpresarioController');

//ofertas
Route::resource('/ofertas', 'OfertaController');
Route::get('/oferta/asistentes/', 'OfertaController@asistentes');

//Unidades-Establecimientos
Route::resource('/unidades', 'EstablecimientoController', ['except' => 'index', 'show']);
Route::get('/unidades/search/{empresario?}', 'EstablecimientoController@index');

//Certificados 

// Route::resource('/certificado','CertificadoController');
