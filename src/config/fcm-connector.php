<?php

return [
    // Firebase server key (required)
    'server_key' => env('FIREBASE_SERVER_KEY', ''),

    // Base URI for FCM API
    'base_uri' => env('FIREBASE_BASE_URI', 'https://fcm.googleapis.com/fcm/'),

    // Optional default options
    'default_options' => [
        'priority' => 'high',
        'time_to_live' => 3600, // seconds
    ],

    // Optional topic prefix
    'topic_prefix' => env('FIREBASE_TOPIC_PREFIX', ''),

    // Enable/disable logging
    'logging' => env('FIREBASE_LOGGING', true),
];
