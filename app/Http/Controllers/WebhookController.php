<?php

namespace App\Http\Controllers;

use App\Coinbase\Charge;
use App\Coinbase\Webhook;
use App\Enums\WebhookStatus;
use App\Models\Charge as ChargeModel;
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
        $payload_as_array = Webhook::capture();
        $charge = new Charge($payload_as_array);

        $s = [
            'checkout_id' => $charge->checkoutId(),
            'charge_type' => $charge->type(),
            // 'payload'     => json_encode($charge->payload),
        ];
        $timestamp = \Carbon\Carbon::now()->timestamp;
        file_put_contents(storage_path('charges/'.$timestamp.".json"), json_encode($s));
        // file_put_contents(storage_path($timestamp.".json"), json_encode($charge->payload));
        
        ChargeModel::create([
            'checkout_id' => $charge->checkoutId(),
            'charge_type' => $charge->type(),
            'payload'     => json_encode($charge->payload),
        ]);
        // ChargeModel::create([
        //     'checkout_id' => $charge->checkoutId(),
        //     'charge_type' => $charge->type(),
        //     'payload'     => json_encode($charge->payload),
        // ]);
// //write json to file
   
        return response(200);
        
        switch ($charge->type()) {
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
