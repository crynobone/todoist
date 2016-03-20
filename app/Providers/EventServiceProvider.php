<?php

namespace App\Providers;

use App\User;
use Orchestra\Support\Facades\Tenanti;
use App\Observers\User as UserObserver;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     *
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        User::observe(new UserObserver());

        Tenanti::connection('tenants', function (User $entity, array $config) {
            $config['database'] = "todoist_{$entity->getKey()}";

            return $config;
        });
    }
}
