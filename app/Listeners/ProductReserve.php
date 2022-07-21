<?php

namespace App\Listeners;

use App\Enums\ProductStatus;
use App\Events\ProductAddedToCart;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductReserve
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductAddedToCart $event)
    {
        $product = $event->product;
        $product->status = ProductStatus::RESERVED;
        $product->save();        
    }
}
