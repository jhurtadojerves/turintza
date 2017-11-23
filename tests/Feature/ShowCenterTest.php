<?php

namespace Tests\Feature\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowCenterTest extends TestCase
{

    function test_a_user_can_see_the_center_details()
    {
        //Having
        $center = factory(\App\Center::class)->create([
            'name' => 'Nombre del Centro',
            'description' => 'Descripción del Centro',
        ]);

        $this->get(route('centers.show', $center))
            ->assertSee($center->name)
            ->assertSee($center->description)
            ->assertSee($center->owner);
    }
}
