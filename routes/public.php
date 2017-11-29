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

Route::get('/', [
    'uses' => 'CenterController@index',
    'as' => 'home.index'
]);

// Centers

Route::get('/centros', [
    'uses' => 'CenterController@index',
    'as' => 'centers.index'
]);

Route::get('centros/{center}-{slug}', [
    'uses' => 'CenterController@show',
    'as' => 'centers.show'
])->where('center', '\d+');



