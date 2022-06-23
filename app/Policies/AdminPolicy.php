<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    use HandlesAuthorization;

    public function view_any(User $user)
    {
        $role = $user->role;
        $response = ($role == 'admin') ? (Response::allow()) : (Response::deny('You have to be an admin to view this'));
        return $response;
    }

    public function action_any(User $user)
    {
        $role = $user->role;
        $response = ($role == 'admin') ? (Response::allow()) : (Response::deny('You have to be an admin to do this'));
        return $response;
    }
}
