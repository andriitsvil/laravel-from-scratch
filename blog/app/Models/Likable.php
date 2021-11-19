<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    /**
     * @param null $user
     * @param bool $liked
     */
    public function like($user = null, bool $liked = true): void
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id()
        ], [
            'liked' => $liked
        ]);
    }

    /**
     * @param null $user
     */
    public function dislike($user = null): void
    {
        $this->like($user, false);
    }

    /**
     * @param User $user
     * @param bool $liked
     * @return bool
     */
    public function isLikedBy(User $user, bool $liked = true): bool
    {
        return (bool)$user->likes->where('tweet_id', $this->id)->where('liked', $liked)->count();
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isDislikedBy(User $user): bool
    {
        return $this->isLikedBy($user, false);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}