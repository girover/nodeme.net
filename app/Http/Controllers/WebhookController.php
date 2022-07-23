<?php

namespace App\Http\Controllers;

use App\Coinbase\Webhook;
use App\Enums\WebhookStatus;
use Girover\Cart\Models\Cart;
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

        Cart::where('user_id', 1)->update(['cart'=>serialize(json_decode($event))]);
        return response(200);
        switch ($event->type) {
            case WebhookStatus::CHARGE_CREATED:
                return WebhookStatus::CHARGE_CREATED;
                break;
            case WebhookStatus::CHARGE_CONFIRMED:
                return WebhookStatus::CHARGE_CONFIRMED;
                break;
            case WebhookStatus::CHARGE_DELAYED:
                return WebhookStatus::CHARGE_DELAYED;
                break;
            case WebhookStatus::CHARGE_PENDING:
                return WebhookStatus::CHARGE_PENDING;
                break;
            case WebhookStatus::CHARGE_FAILED:
                return WebhookStatus::CHARGE_FAILED;
                break;
            case WebhookStatus::CHARGE_RESOLVED:
                return WebhookStatus::CHARGE_RESOLVED;
                break;
            
            default:
                return 'no webhook';
                break;
        }
    }
}
