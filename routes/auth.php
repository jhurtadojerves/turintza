<?php

// Centers
Route::get('centros/crear', [
    'uses' => 'CreateCenterController@create',
    'as' => 'centers.create'
]);

Route::post('centros/crear', [
    'uses' => 'CreateCenterController@store',
    'as' => 'centers.store'
]);

Route::post('centros/{center}/comentar', [
   'uses' => 'CommentController@store',
   'as' =>  'comments.store'
]);

Route::get('centros/{center}-{slug}/imagenes', [
    'uses' => 'ImageController@create',
    'as' => 'images.create'
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); //Just added to fix issue

Route::post('centros/{center}-{slug}/imagenes', [
    'uses' => 'ImageController@store',
    'as' => 'images.store'
]);