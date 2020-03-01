<?php

namespace App\Providers;

use App\Extensions\SSOUserProvider;
use Illuminate\Auth\SessionGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('sso', function ($app, $name, array $config) {
            // automatically build the DI, put it as reference
            $userProvider = new SSOUserProvider($app['hash'], config('auth.providers.users.model'));
            $request = app('request');

            return new SessionGuard('sso_session', $userProvider, app()->make('session.store'), $request);
        });
    }
}
