<?php

namespace Tests\Feature;

use App\Center;

class CenterListTest extends FeatureTestCase
{

    function test_a_user_can_see_the_center_and_got_to_the_details()
    {
        $center = factory(\App\Center::class)->create([
            'name' => 'Restaurante buenaventura'
        ]);

        $this->get('/centros-turisticos')
            ->assertSeeText($center->name);

        $this->get($center->url)
            ->isOk();

    }

    function test_the_posts_are_paginated()
    {
        $first = factory(Center::class)->create([
           'name' => 'Orquideario la maravilla'
        ]);

        factory(Center::class)->times(15)->create();

        $last = factory(Center::class)->create([
            'name' => 'Zoologico el paraiso'
        ]);

        $this->get('/centros-turisticos')
            ->assertStatus(200)
            ->assertSeeText($first->name)
            ->assertDontSeeText($last->name)
            ->assertSeeText('2');

        $this->get('/centros-turisticos/?page=2')
            ->assertSeeText($last->name)
            ->assertDontSeeText($first->name);
    }
}
