<?php

namespace App\Http\Controllers;

use App\Coinbase\Checkout;
use App\Coinbase\Webhook;
use App\Http\Requests\RemoveItemRequest;
use App\Models\Checkout as ModelsCheckout;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the shopping cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.cart.index')->with('cart', shopping_cart());
    }

    /**
     * Remove item from shopping cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeItem(RemoveItemRequest $request)
    {
        if (! shopping_cart()->hasItem($request->number)) {
            return back()->with('error', 'Item not found in the cart.');
        }

        shopping_cart()->removeItem($request->number);

        $product = Product::where('number', $request->number)->first();
        
        if ($product) {
            $product->makeAvailable();
        }

        return back()->with('success', 'Item removed from cart.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout($csrf_token)
    {
        if ($csrf_token !== csrf_token()) {
            abort(419);
        }

        $checkout = new Checkout;
        if ($checkout->newCheckout(auth()->user(), shopping_cart()->totalPrice())) {
            
            // create checkout in database
            ModelsCheckout::create([
                'user_id'=>auth()->user()->id, 
                'coinbase_checkout_id'=>$checkout->id(), 
                'cart'=>serialize(shopping_cart())
            ]);

            // clear the shopping cart
            shopping_cart()->clear();
        }

        return $checkout->getBtnCode();
    }
}
