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

Route::get('/', 'CenterController@catalog');

Route::get('/centros', 'CenterController@catalog');

Route::get('/centros/{slug}', 'CenterController@detail');

Route::get('/usuarios', 'UserController@catalog');

Route::get('/usuarios/{id}/', 'UserController@detail')->where('id', '[0-9]+');

Route::get('/usuarios/nuevo', 'UserController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
