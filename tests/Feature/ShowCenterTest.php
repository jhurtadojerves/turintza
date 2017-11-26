<?php

namespace Tests\Feature;

class ShowCenterTest extends FeatureTestCase
{
    function test_a_user_can_see_the_center_details()
    {
        //Having
        $center = factory(\App\Center::class)->create([
            'name' => 'Nombre del Centro',
            'description' => 'Descripción del Centro',
        ]);

        $this->get($center->url)
            ->assertSee($center->name)
            ->assertSee($center->description)
            ->assertSee($center->owner);
    }

    function test_old_urls_are_redirected(){
        $center = factory(\App\Center::class)->create([
            'name' => 'Mirador el barranco'
        ]);

        $old_url = $center->url;

        $center->update([
           'name' => 'Mirador la barranca'
        ]);

        $this->get($old_url)
            ->assertRedirect($center->url);

    }

}
