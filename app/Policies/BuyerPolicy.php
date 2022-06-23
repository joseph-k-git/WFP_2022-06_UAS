<?php

namespace App\Policies;

use App\User;
use App\Transaction;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BuyerPolicy
{
    use HandlesAuthorization;

    public function view_any(User $user)
    {
        $role = $user->role;
        $response = ($role == 'buyer') ? (Response::allow()) : (Response::deny('You have to be an buyer to view this'));
        return $response;
    }
}
