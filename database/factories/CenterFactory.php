<?php
/**
 * Created by PhpStorm.
 * User: Juliens
 * Date: 022, Nov 22, 2017
 * Time: 12:11 PM
 */

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Center::class, function (Faker $faker){
    return [
        'name' => $faker->sentence,
        'geolocation' => $faker->address,
        'owner' => $faker->name,
        'description' => $faker->paragraph,
    ];
});