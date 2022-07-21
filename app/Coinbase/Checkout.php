<?php

namespace App\Coinbase;

use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Checkout as CoinbaseCheckout;

class Checkout {

    private $created_checkout;

    public function __construct() {
        
        $apiClientObj = ApiClient::init(env('COINBASE_API'));
    }

    public function newCheckout($user, $amount)
    {
        $checkoutData = [
            'name' => $user->uuid,
            'description' => $user->uuid,
            'pricing_type' => 'fixed_price',
            'local_price' => [
                'amount' => $amount,
                'currency' => 'USD'
            ],
            'uuid'=>$user->uuid,
            'requested_info' => ['email']
        ];

        try {
            $newCheckoutObj = CoinbaseCheckout::create($checkoutData);

            $this->created_checkout = $newCheckoutObj;
            
            return true;

        } catch (\Throwable $th) {

            return false;
        }
    }

    public function getBtnCode()
    {
        if (! $this->created_checkout) {
            return '';
        }
        return '
                <div>
                <a class="buy-with-crypto"
                    href="https://commerce.coinbase.com/checkout/'.$this->created_checkout->id.'">
                    Buy with Crypto
                </a>
                <script src="https://commerce.coinbase.com/v1/checkout.js?version=201807">
                </script>
                </div>';
    }

    /**
     * get the created checkout in coinbase website
     * 
     * @return coinbase_checkout
     */
    public function createdCheckout()
    {
        return $this->created_checkout;
    }

    /**
     * get the id of created checkout
     * 
     * @return string id of checkout
     */
    public function id()
    {
        return $this->created_checkout->id;
    }
}