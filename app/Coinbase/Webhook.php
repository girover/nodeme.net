<?php

namespace App\Coinbase;

use CoinbaseCommerce\Webhook as CoinbaseWebhook;

class Webhook {

    public static function capture()
    {
        $secret = env('COINBASE_WEBHOOK_SECRET_KEY');
        $headerName = 'X-Cc-Webhook-Signature';
        $headers = getallheaders();
        $signraturHeader = isset($headers[$headerName]) ? $headers[$headerName] : null;
        $payload = trim(file_get_contents('php://input'));

        try {
            $event = CoinbaseWebhook::buildEvent($payload, $signraturHeader, $secret);
            http_response_code(200);
            // echo sprintf('Successfully verified event with id %s and type %s.', $event->id, $event->type);
            
            // Get payload json as an array 
            return json_decode($payload, true);

        } catch (\Exception $exception) {
            http_response_code(400);
            echo 'Error occurred. ' . $exception->getMessage();

            return null;
        }
    }
}