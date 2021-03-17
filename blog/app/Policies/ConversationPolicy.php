<?php

namespace App\Policies;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

//    public function before(User $user)
//    {
//        if ($user->id === 6) { // admin
//            return true;
//        }
//    }

    public function view(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Conversation $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }
}
