<?php

namespace gadixsystem\systemInformation;

use Illuminate\Support\ServiceProvider;
use gadixsystem\systeminformation\SystemInformation;

class SystemInformationServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Allow your user to publish the config
        $this->publishes([
            __DIR__ . '/config/systeminformation.php' => config_path('systeminformation.php'),
        ], 'config');
    }
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/systeminformation.php',
            'systeminformation'
        );
        $this->app->singleton(SystemInformation::class, function ($app) {
            return new SystemInformation();
        });
    }
}
