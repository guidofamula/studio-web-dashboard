<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage_posts', function($user) {
            return $user->hasAnyPermission([
                'post_show',
                'post_create',
                'post_update',
                'post_detail',
                'post_delete',
            ]);
        });

        Gate::define('manage_categories', function($user) {
            return $user->hasAnyPermission([
                'category_show',
                'category_create',
                'category_update',
                'category_detail',
                'category_delete',
            ]);
        });
    }
}
