<?php

namespace Tests\Feature;

use Tests\Browser\FeatureBrowserTest;
use Tests\Feature;
use Laravel\Dusk\Browser;


class WriteCommentTest extends FeatureBrowserTest
{
    function test_a_user_can_write_a_comment()
    {
        $center = factory(\App\Center::class)->create();
        $user = $this->defaultUser();
        $this->browse(function (Browser $browser) use ($user, $center) {
            //dd($center->url);
            $browser->loginAs($user->id)
                ->visit(route('centers.show', [$center, $center->slug]))
                ->press('Comentar');

        });
    }
}
