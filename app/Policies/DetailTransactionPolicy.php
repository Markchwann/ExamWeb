<?php
namespace App\Policies;

use App\Models\User;
use App\Models\DetailTransaction;

class DetailTransactionPolicy
{
    public function isAdmin(User $user)
    {
        return $user->isAdmin();
    }

    public function edit(User $user, DetailTransaction $detailTransaction)
    {
        return $user->isAdmin() || $user->id === $detailTransaction->user_id;
    }
    public function delete(User $user, DetailTransaction $detailTransaction)
    {
        return $user->isAdmin();
    }

}
