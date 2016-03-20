<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use Orchestra\Extension\Traits\DomainAwareTrait;

class AppServiceProvider extends ServiceProvider
{
    use DomainAwareTrait;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        // Ensure `orchestra.user` is aliased to App\User model.
        $this->app->alias(User::class, 'orchestra.user');
    }
}
