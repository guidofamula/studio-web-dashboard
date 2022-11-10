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

        // Gate Permission for posts
        Gate::define('manage_posts', function($user) {
            return $user->hasAnyPermission([
                'post_show',
                'post_create',
                'post_update',
                'post_detail',
                'post_delete',
            ]);
        });

        // Gate Permission for categories
        Gate::define('manage_categories', function($user) {
            return $user->hasAnyPermission([
                'category_show',
                'category_create',
                'category_update',
                'category_detail',
                'category_delete',
            ]);
        });

        // Gate Permission for tags
        Gate::define('manage_tags', function($user) {
            return $user->hasAnyPermission([
                'tag_show',
                'tag_create',
                'tag_update',
                'tag_delete',
            ]);
        });

        // Gate Permission for users
        Gate::define('manage_users', function($user) {
            return $user->hasAnyPermission([
                'user_show',
                'user_detail',
                'user_create',
                'user_update',
                'user_delete',
            ]);
        });

        // Gate Permission for roles
        Gate::define('manage_roles', function($user) {
            return $user->hasAnyPermission([
                'role_show',
                'role_detail',
                'role_create',
                'role_update',
                'role_delete',
            ]);
        });
    }
}
