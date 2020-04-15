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

Route::get('perfil/{id}', 'UserController@perfil')->name('user.perfil');
Route::get('user/amigos', 'UserController@usuarios')->name('user.usuarios');
Route::get('user/configuracion', 'UserController@index')->name('config');
Route::post('user/configuracion/update', 'UserController@update')->name('config.update');
Route::get('user/configuracion/{avatar}', 'UserController@getImage')->name('config.avatar');

Route::get('user/subir-imagen/', 'ImagenController@index')->name('imagen.index');
Route::post('user/subir-imagen/imagen/', 'ImagenController@save')->name('imagen.save');

Route::get('image/users/{avatar}', 'ImagenController@obtenerImagen')->name('imagen.imagen');
Route::get('imagen/{id}', 'ImagenController@detalle')->name('imagen.detalle');
Route::get('imagen/delete/{id}', 'ImagenController@delete')->name('imagen.delete');
Route::post('imagen/update', 'ImagenController@update')->name('imagen.update');

Route::post('comentario/', 'ComentController@save')->name('coment.save');
Route::get('comentario/delete/{id}', 'ComentController@delete')->name('coment.delete');

Route::get('likes/{id}', 'LikeController@like')->name('like.like');
Route::get('dislikes/{id}', 'LikeController@dislike')->name('like.dislike');
