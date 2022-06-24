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

    public function action_any(User $user)
    {
        $role = $user->role;
        $response = ($role == 'buyer') ? (Response::allow()) : (Response::deny('You have to be an buyer to do this'));
        return $response;
    }

    public function view_transaction(User $user, Transaction $transaction)
    {
        $userId = $user->id;
        $transaction_userId = $transaction->userId;
        $response = ($userId == $transaction_userId) ? (Response::allow()) : (Response::deny('You have to be the owner of the transaction to view it'));
        return $response;
    }
}
