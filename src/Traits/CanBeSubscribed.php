<?php

/*
 * This file is part of the overtrue/laravel-follow.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace Overtrue\LaravelFollow\Traits;

use Overtrue\LaravelFollow\Follow;

/**
 * Trait CanBeSubscribed.
 */
trait CanBeSubscribed
{
    /**
     * Check if user is subscribed by given user.
     *
     * @param int    $user
     *
     * @return bool
     */
    public function isSubscribedBy($user)
    {
        return Follow::isRelationExists($this, 'subscribers', $user, Follow::RELATION_SUBSCRIBE);
    }

    /**
     * Return followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->morphMany(config('follow.user_model'), config('follow.morph_prefix'), config('follow.followable_table'))
                    ->where('relation', Follow::RELATION_SUBSCRIBE);
    }
}
