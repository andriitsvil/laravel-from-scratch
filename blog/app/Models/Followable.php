<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable
{

    /**
     * @param User $user
     * @return bool
     */
    public function isFollowing(User $user): bool
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    /**
     * @param User $user
     * @return array
     */
    public function follow(User $user): array
    {
        return $this->follows()->sync($user, false);
    }

    /**
     * @return BelongsToMany
     */
    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    /**
     * @param User $user
     */
    public function toggleFollow(User $user): void
    {
        $this->follows()->toggle($user);
    }

    /**
     * @param User $user
     * @return int
     */
    public function unfollow(User $user): int
    {
        return $this->follows()->detach($user);
    }
}