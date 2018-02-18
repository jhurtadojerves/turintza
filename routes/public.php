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

//Auth::routes();

//  Users CRUD
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout.fix'); //Just added to fix issue

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback/', 'Auth\SocialAuthController@handleProviderCallback');




//News CRUD Public
Route::get('/noticias', [
    'uses' => 'NewController@index',
    'as' => 'news.index'
]);

Route::get('noticias/{neww}-{slug}', [
    'uses' => 'NewController@show',
    'as' => 'news.show'
])->where('neww', '\d+');

//Home and others

Route::get('/', [
    'uses' => 'HomeController@redirect',
    'as' => 'home.redirect'
]);

Route::get('/turismo', [
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

Route::get('usuarios/{user}-{slug}', [
    'uses' => 'UserController@show',
    'as' => 'users.show'
]);

