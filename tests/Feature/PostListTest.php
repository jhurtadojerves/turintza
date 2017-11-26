<?php

namespace Tests\Feature;

use App\Center;

class PostListTest extends FeatureTestCase
{

    function test_a_user_can_see_the_center_and_got_to_the_details()
    {
        $center = factory(\App\Center::class)->create([
            'name' => 'Restaurante buenaventura'
        ]);

        $this->get('/')
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

        $this->get('/')
            ->assertSee($first->name)
            ->assertDontSee($last->name)
            ->assertSee('2');

        $this->get('/?page=2')
            ->assertSee($last->name)
            ->assertDontSeeText($first->name);
    }
}
