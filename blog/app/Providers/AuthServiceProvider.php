<?php

namespace App\Providers;

use App\Models\Conversation;
use App\Models\User;
use App\Policies\ConversationPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Conversation::class => ConversationPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update', function (User $user, Conversation $conversation) {
//            return $conversation->user->is($user);
//        });

//        Gate::before(function (User $user) { // admin
//            if ($user->id === 6) {
//                return true;
//            }
//        });
        Gate::before(function($user, $ability) {
            return $user->abilities()->contains($ability);
        });
    }
}
