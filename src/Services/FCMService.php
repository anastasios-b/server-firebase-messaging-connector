<?php

namespace YourVendor\ServerFirebaseMessagingConnector\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use YourVendor\ServerFirebaseMessagingConnector\Models\FCMToken;

class FCMService
{
    protected $serverKey;
    protected $client;
    protected $logging;

    public function __construct()
    {
        $this->serverKey = config('fcm-connector.server_key');
        $this->client = new Client(['base_uri' => config('fcm-connector.base_uri')]);
        $this->logging = config('fcm-connector.logging', true);
    }

    public function sendToToken(string $token, array $notification)
    {
        try {
            $response = $this->client->post('send', [
                'headers' => [
                    'Authorization' => 'key=' . $this->serverKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'to' => $token,
                    'notification' => $notification,
                ]
            ]);

            if ($this->logging) {
                Log::info('[FCM] Notification sent', [
                    'token' => $token,
                    'notification' => $notification,
                    'status' => $response->getStatusCode(),
                ]);
            }

            return $response;
        } catch (\Exception $e) {
            if ($this->logging) {
                Log::error('[FCM] Notification failed', [
                    'token' => $token,
                    'notification' => $notification,
                    'error' => $e->getMessage(),
                ]);
            }

            throw $e;
        }
    }
}
