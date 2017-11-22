<?php

namespace Tests\Feature;

use Tests\FeatureTestCase;

class ExampleTest extends FeatureTestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    function test_basic_example()
    {
        $name = 'Julio Hurtado';
        $email = 'admin@ilvermorny.es';
        $user = factory(\App\User::class)->create([
            'name' => $name,
            'email' => $email,
        ]);
        $this->actingAs($user, 'api')
            ->get('api/user')
            ->assertSee($name)
            ->assertSee($email);
    }
}
