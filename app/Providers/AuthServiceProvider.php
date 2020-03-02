<?php

namespace App\Providers;

use Laravel\Passport\Passport;
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
        Gate::define('isAdmin', function($user){
          if($user->type == 'admin'){
              return true;
          }
        });

        Gate::define('mentor', function($user){
            if($user->type == 'admin' || $user->type == 'mentor'){
                return true;
            }
          });

        Passport::routes();
    }
}
