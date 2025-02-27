<?php

namespace cakeflow\Providers;

use cakeflow\Dispatchers\ControllerDispatcher;
use Illuminate\Foundation\Application;
use Illuminate\Routing\Contracts\ControllerDispatcher as ControllerDispatcherContract;
use Illuminate\Support\ServiceProvider;

class CakeflowServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ControllerDispatcherContract::class, function (Application $app) {
            return new ControllerDispatcher();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
