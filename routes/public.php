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

//Home and others

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);

Route::get('/geografia', [
    'uses' => 'HomeController@geography',
    'as' => 'home.geography'
]);

Route::get('/cultura', [
    'uses' => 'HomeController@culture',
    'as' => 'home.culture'
]);

Route::get('/como-llegar', [
    'uses' => 'HomeController@how',
    'as' => 'home.how'
]);



// Centers CRUD Public

Route::get('/centros-turisticos', [
    'uses' => 'CenterController@index',
    'as' => 'centers.index'
]);

Route::get('centros-turisticos/{center}-{slug}', [
    'uses' => 'CenterController@show',
    'as' => 'centers.show'
])->where('center', '\d+');



