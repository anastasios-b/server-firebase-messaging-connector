<?php

namespace YourVendor\ServerFirebaseMessagingConnector;

use Illuminate\Support\ServiceProvider;
use YourVendor\ServerFirebaseMessagingConnector\Services\FCMService;

class FCMServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('fcm-service', function ($app) {
            return new FCMService();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/fcm-connector.php', 'fcm-connector');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/fcm-connector.php' => config_path('fcm-connector.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
