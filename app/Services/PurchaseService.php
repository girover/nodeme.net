<?php

namespace App\Services;

use App\Models\Product;
use Girover\Cart\Cart;

class PurchaseService {

    public function __construct() {
        
    }

    /**
     * Get list of numbers that should be bought
     * 
     * @param \Girover\Cart\Cart
     * @return array array of numbers to buy
     */
    public function numbersToBuy(Cart $cart)
    {
        $numbers_to_buy  = array_keys($cart->allItems());
        return Product::notSold()
                      ->whereIn('number', $numbers_to_buy)
                      ->pluck('number')
                      ->toArray();
    }
}