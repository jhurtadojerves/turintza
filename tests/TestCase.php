<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var \App\User
     */
    protected $defaultUser;

    /**
     * @return mixed
     */
    public function defaultUser()
    {
        if($this->defaultUser){
            return $this->defaultUser;
        }

        return $this->defaultUser = factory(User::class)->create();

    }
}


