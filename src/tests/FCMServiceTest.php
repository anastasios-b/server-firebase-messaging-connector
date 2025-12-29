<?php

namespace YourVendor\ServerFirebaseMessagingConnector\Facades;

use Illuminate\Support\Facades\Facade;

class FCMConnector extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fcm-service';
    }
}
