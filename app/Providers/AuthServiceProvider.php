<?php

namespace App\Providers;

use App\Models\BlockUser;
use App\Models\Property;
use App\Models\ReportProduct;
use App\Models\ReportUser;
use App\Models\Role;
use App\Models\StoppedProduct;
use App\Models\Support;
use App\Models\User;
use App\Policies\BlockPolicy;
use App\Policies\PropertyPolicy;
use App\Policies\ReportProductPolicy;
use App\Policies\ReportUserPolicy;
use App\Policies\RolePolicy;
use App\Policies\StoppedProductPolicy;
use App\Policies\SupportPolicy;
use App\Policies\UserPolicy;
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
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        BlockUser::class => BlockPolicy::class,
        Support::class => SupportPolicy::class,
        Property::class => PropertyPolicy::class,
        ReportProduct::class => ReportProductPolicy::class,
        ReportUser::class => ReportUserPolicy::class,
        StoppedProduct::class => StoppedProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('access-dashboard', function ($user) {
            return $user->role->id !== 4;
        });

        Gate::define('send-notifications', function ($user) {
            return $user->hasAbility('notifications.send');
        });
    }
}
