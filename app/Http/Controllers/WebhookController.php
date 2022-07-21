<?php

namespace App\Http\Controllers;

use App\Coinbase\Webhook;
use App\Enums\WebhookStatus;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    /**
     * Capture the webhook event sent from coinbase
     * 
     * @param \Illuminate\Http\Request $request
     */
    public function capture(Request $request)
    {
        $event = Webhook::capture();

        switch ($event->type) {
            case WebhookStatus::CHARGE_CREATED:
                # code...
                break;
            case WebhookStatus::CHARGE_CONFIRMED:
                # code...
                break;
            case WebhookStatus::CHARGE_DELAYED:
                # code...
                break;
            case WebhookStatus::CHARGE_PENDING:
                # code...
                break;
            case WebhookStatus::CHARGE_FAILED:
                # code...
                break;
            case WebhookStatus::CHARGE_RESOLVED:
                # code...
                break;
            
            default:
                # code...
                break;
        }
    }
}
