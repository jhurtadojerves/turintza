<?php
// Centers CRUD Auth
Route::get('centros-turisticos/crear', [
    'uses' => 'CreateCenterController@create',
    'as' => 'centers.create'
]);

Route::post('centros-turisticos/crear', [
    'uses' => 'CreateCenterController@store',
    'as' => 'centers.store'
]);

Route::get('centros-turisticos/{center}-{slug}/editar', [
    'uses' => 'CenterController@edit',
    'as' => 'centers.edit'
]);

Route::put('centros-turisticos/{center}-{slug}/editar', [
    'uses' => 'CenterController@update',
    'as' => 'centers.update'
]);


// Comments CRUD Auth
Route::post('centros-turisticos/{center}/comentar', [
   'uses' => 'CommentController@store',
   'as' =>  'comments.store'
]);

//Image CRUD Auth
Route::post('centros-turisticos/{center}-{slug}/imagenes', [
    'uses' => 'ImageController@store',
    'as' => 'images.store'
]);

Route::get('centros-turisticos/{center}-{slug}/imagenes', [
    'uses' => 'ImageController@create',
    'as' => 'images.create'
]);

//News CRUD Auth

Route::get('noticias/agregar', [
    'uses' => 'NewController@create',
    'as' => 'news.create'
]);

Route::post('noticias/crear', [
    'uses' => 'NewController@store',
    'as' => 'news.store'
]);