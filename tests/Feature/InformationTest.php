<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InformationTest extends TestCase
{
    function test_a_user_can_see_the_home_page()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSeeText('Iniciar sesión')
            ->assertSeeText('Registrarse')
            ->assertSeeText('Por su topografía y ubicación privilegiada Tiwintza amalgama exuberantes muestras de flora y fauna ');
    }

    function test_a_logguedd_user_can_see_the_home_page()
    {
        $user = factory(\App\User::class)->create([
           'name' => 'Julio Hurtado'
        ]);
        $this->actingAs($user)->get('/')
            ->assertStatus(200)
            ->assertSeeText($user->name)
            ->assertSeeText('Cerrar Sesión')
            ->assertSeeText('Por su topografía y ubicación privilegiada Tiwintza amalgama exuberantes muestras de flora y fauna ');
    }

    function test_a_user_can_see_the_geography_page()
    {
        $this->get('/geografia')
            ->assertStatus(200)
            ->assertSeeText('El Cantón Tiwintza, se encuentra localizado al sureste de la Provincia de Morona Santiago');
    }

    function test_a_user_can_see_the_culture_page()
    {
        $this->get('/cultura')
            ->assertStatus(200)
            ->assertSeeText('Patrimonio Cultural: Los Shuar.');
    }

    function test_a_user_can_see_the_how_page()
    {
        $this->get('/como-llegar')
            ->assertStatus(200)
            ->assertSeeText('Tiwintza cuenta con una vía de acceso terrestre, y es la vía Méndez – San José de Morona');
    }
}
