<?php

// Centers
Route::get('centros-turisticos/crear', [
    'uses' => 'CreateCenterController@create',
    'as' => 'centers.create'
]);

Route::post('centros-turisticos/crear', [
    'uses' => 'CreateCenterController@store',
    'as' => 'centers.store'
]);

Route::post('centros-turisticos/{center}/comentar', [
   'uses' => 'CommentController@store',
   'as' =>  'comments.store'
]);

Route::get('centros-turisticos/{center}-{slug}/imagenes', [
    'uses' => 'ImageController@create',
    'as' => 'images.create'
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); //Just added to fix issue

Route::post('centros-turisticos/{center}-{slug}/imagenes', [
    'uses' => 'ImageController@store',
    'as' => 'images.store'
]);