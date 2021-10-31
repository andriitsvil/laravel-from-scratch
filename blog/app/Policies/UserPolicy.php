<?php

namespace App\Policies;

use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;


class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $currentUser
     * @param User $user
     * @return bool
     */
    public function edit(User $currentUser, User $user): bool
    {
        return $currentUser->is($user);
    }
}
