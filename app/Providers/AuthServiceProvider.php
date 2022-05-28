<?php

namespace App\Providers;

use App\Models\Acl\permission;
use App\Models\Market\Order;
use App\Policies\OrderPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Order::class => OrderPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit-user' , function ($user , $currentUser){
           return $user->id ==$currentUser->id;
        });

        foreach (Permission::all() as $permission) {
            Gate::define($permission->name , function($user) use ($permission){
                return $user->hasPermission($permission);
            });
        }
    }
}
