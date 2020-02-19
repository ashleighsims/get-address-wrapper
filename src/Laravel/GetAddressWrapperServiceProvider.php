<?php

namespace AshleighSims\GetAddressWrapper\Laravel;

use AshleighSims\GetAddressWrapper\GetAddressWrapper;
use Illuminate\Support\ServiceProvider;

class GetAddressWrapperServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/getaddress.php', 'getaddress');

        // Register the service the package provides.
        $this->app->singleton(GetAddressWrapper::class, function () {
            return new GetAddressWrapper(config('getaddress.api-key'), config('getaddress.admin-api-key'), config('getaddress.google-places-api-key'), config('getaddress.base-url'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [GetAddressWrapper::class];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/getaddress.php' => config_path('getaddress.php'),
        ], 'getaddress.config');
    }
}
