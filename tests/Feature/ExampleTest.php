<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
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
