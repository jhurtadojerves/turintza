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
Auth::routes();

Route::get('/', 'CenterController@catalog');

// Centers

Route::get('centros/crear', [
    'uses' => 'CreateCenterController@create',
    'as' => 'centers.create'
]);

Route::post('centros/crear', [
    'uses' => 'CreateCenterController@store',
    'as' => 'centers.store'
]);




