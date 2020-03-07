<?php

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');

Route::get('dashboard/', 'DashboardController@index')->name('dashboard.index');
Route::post('logout', 'DashboardController@logout')->name('logout');

Route::get('user/configuracion', 'UserController@index')->name('config');
Route::post('user/configuracion/update', 'UserController@update')->name('config.update');

Route::get('user/configuracion/{avatar}', 'UserController@getImage')->name('config.avatar');

Route::get('user/subir-imagen/', 'ImagenController@index')->name('imagen.index');
Route::post('user/subir-imagen/', 'ImagenController@save')->name('imagen.save');
Route::get('image/users/{avatar}', 'ImagenController@obtenerImagen')->name('imagen.imagen');
Route::get('imagen/{id}', 'ImagenController@detalle')->name('imagen.detalle');
Route::get('imagen/users/{id}', 'ImagenController@imagenUsuario')->name('imagen.imagenusuario');

Route::post('comentario/', 'ComentController@save')->name('coment.save');
