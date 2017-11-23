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