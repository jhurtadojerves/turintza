<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CenterTest extends TestCase
{
    /** @test */
    function it_loads_the_center_list_page()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Listado de Centros Turísticos');
    }
}
