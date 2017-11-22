<?php
/**
 * Created by PhpStorm.
 * User: Juliens
 * Date: 021, Nov 21, 2017
 * Time: 9:10 PM
 */

namespace Tests\Feature;


use Tests\FeatureTestCase;

class CreateCenterTest extends FeatureTestCase
{
    public function test_a_user_create_a_post()
    {
        //Having
        $name = 'Este es el nombre del centro turístico';
        $data = [
            'name' =>  $name,
            'description' => 'Esta es la descripción del centro turístico',
            'geolocation' => '84848, 1818',
            'owner' => 'Nombre Apellido'
        ];
        $data2 = $data;

        //When
        $this->actingAs($this->defaultUser())
        ->get(route('centers.create'))
        ->assertSee('Crear Centro Turístico');

        $response = $this->post(route('centers.store', $data));


        //Then

        // Center is create in database
        $this->assertDatabaseHas('centers', [
            'name' => $name,
        ]);
        //Test a user is redirected to the center details after creating it.
        $response->assertSee($name);
    }
}