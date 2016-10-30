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

        Gate::define('bus-search', function ($user) {
            return $user->is_admin == 0;
        });

        Gate::define('bus', function ($user) {
            return $user->is_admin == 1;
        });

        Gate::define('/bus/create', function ($user) {
            return $user->is_admin == 1;
        });

        Gate::define('/bus/store', function ($user) {
            return $user->is_admin == 1;
        });

        Gate::define('/bus/show/{id}', function ($user) {
            return $user->is_admin == 1;
        });

        Gate::define('/bus/update/{id}', function ($user) {
            return $user->is_admin == 1;
        });

        Gate::define('/bus-schedule/store', function ($user) {
            return $user->is_admin == 1;
        });
    }
}
