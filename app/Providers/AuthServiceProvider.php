<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-users', function ($user) {
            if ($user->roles->find(1) == null) {
                return false;
            }
            return true;
        });

        Gate::define('is-teacher', function ($user) {
            if ($user->roles->find(2) == null) {
                return false;
            }
            return true;
        });

        Gate::define('is-student', function ($user) {
            if ($user->roles->find(3) == null) {
                return false;
            }
            return true;
        });
    }
}
