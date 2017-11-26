<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CenterPolicy
{
    use HandlesAuthorization;
    public function create(User $user)
    {
        return $user->type === 'admin';
    }


}
