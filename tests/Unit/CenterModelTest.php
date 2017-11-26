<?php

namespace Tests\Unit;


use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Center;

class CenterModelTest extends TestCase
{
    function test_adding_a_name_generates_a_slug()
    {
        $post = new Center([
            'name' => 'Mirador Río Santiago',
        ]);

        $this->assertSame('mirador-rio-santiago', $post->slug);
    }

    function test_editing_the_name_change_the_slug()
    {
        $post = new Center([
            'name' => 'Mirador Río Santiago',
        ]);

        $post->name = 'Mirador Río Morona';

        $this->assertSame('mirador-rio-morona', $post->slug);
    }
}
