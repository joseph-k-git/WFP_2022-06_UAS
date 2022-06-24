<?php

namespace App\Providers;

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

        Gate::define('admin-view_any', 'App\Policies\AdminPolicy@view_any');
        Gate::define('admin-action_any', 'App\Policies\AdminPolicy@action_any');

        Gate::define('buyer-view_any', 'App\Policies\BuyerPolicy@view_any');
        Gate::define('buyer-action_any', 'App\Policies\BuyerPolicy@view_any');
    }
}
