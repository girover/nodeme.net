<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authenticated user Routes
|--------------------------------------------------------------------------
| Routes that require Authenticated user
|
| Get:  /dashboard
| 
| Get:  /products
| Get:  /products/{number}/add-to-cart
| 
| Get:  /shopping-cart
| Get:  /shopping-cart/remove/{id}
| Get:  /shopping-cart/checkout
|
| Get:  /my-products
|
| Get:  /invite
| Post: /invite
|
*/

// Route::middleware(['postman'])->prefix('user')->name('user.')->group(function () {
Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', function(){
        $f = '{
            "attempt_number": 1,
            "event": {
                "api_version": "2018-03-22",
                "created_at": "2022-07-31T21:45:54Z",
                "data": {
                    "id": "bf9176b5-ddd9-4527-8b34-8dbf5ebd989e",
                    "code": "2HLKTW39",
                    "name": "b8fc39e8-cb39-4074-9146-412160be9a90",
                    "utxo": false,
                    "pricing": {
                        "dai": {
                            "amount": "0.999950002499875006",
                            "currency": "DAI"
                        },
                        "usdc": {
                            "amount": "1.000000",
                            "currency": "USDC"
                        },
                        "local": {
                            "amount": "1.00",
                            "currency": "USD"
                        },
                        "tether": {
                            "amount": "0.999755",
                            "currency": "USDT"
                        },
                        "apecoin": {
                            "amount": "0.142979696883042608",
                            "currency": "APE"
                        },
                        "bitcoin": {
                            "amount": "0.00004226",
                            "currency": "BTC"
                        },
                        "dogecoin": {
                            "amount": "14.28367376",
                            "currency": "DOGE"
                        },
                        "ethereum": {
                            "amount": "0.000587000",
                            "currency": "ETH"
                        },
                        "litecoin": {
                            "amount": "0.01620877",
                            "currency": "LTC"
                        },
                        "shibainu": {
                            "amount": "83647.009619406000000000",
                            "currency": "SHIB"
                        },
                        "bitcoincash": {
                            "amount": "0.00690536",
                            "currency": "BCH"
                        }
                    },
                    "checkout": {
                        "id": "dcc66bc6-9029-44d6-899a-ed6a7972f64b"
                    },
                    "fee_rate": 0.01,
                    "logo_url": "",
                    "metadata": {
                        "email": "majed@majed.com"
                    },
                    "payments": [],
                    "resource": "charge",
                    "timeline": [{
                        "time": "2022-07-31T21:45:54Z",
                        "status": "NEW"
                    }],
                    "addresses": {
                        "dai": "0xc6e199245611c0c8a7af9d59d8744907f386347a",
                        "usdc": "0xc6e199245611c0c8a7af9d59d8744907f386347a",
                        "tether": "0xc6e199245611c0c8a7af9d59d8744907f386347a",
                        "apecoin": "0xc6e199245611c0c8a7af9d59d8744907f386347a",
                        "bitcoin": "3M7gK1eMp2VXfkQCwjmiZd6ETWrPAyNYpp",
                        "dogecoin": "D6DNDF8VT4nyzmzso4NAgrNaZtcKQCbP4Q",
                        "ethereum": "0xc6e199245611c0c8a7af9d59d8744907f386347a",
                        "litecoin": "MVdu5z7Q96YWz7rFmhHmf1kDc2cMMBeKai",
                        "shibainu": "0xc6e199245611c0c8a7af9d59d8744907f386347a",
                        "bitcoincash": "qqzcym7e0lguy83kq03j8m86f5twgdz3mcjf3cffzv"
                    },
                    "pwcb_only": false,
                    "cancel_url": "https://nodeme.net",
                    "created_at": "2022-07-31T21:45:54Z",
                    "expires_at": "2022-07-31T22:45:54Z",
                    "hosted_url": "https://commerce.coinbase.com/charges/2HLKTW39",
                    "brand_color": "#456D9C",
                    "description": "b8fc39e8-cb39-4074-9146-412160be9a90",
                    "fees_settled": true,
                    "pricing_type": "fixed_price",
                    "support_email": "girover.mhf@gmail.com",
                    "brand_logo_url": "",
                    "exchange_rates": {
                        "APE-USD": "6.994",
                        "BCH-USD": "144.815",
                        "BTC-USD": "23662.575",
                        "DAI-USD": "1.00005",
                        "ETH-USD": "1704.455",
                        "LTC-USD": "61.695",
                        "DOGE-USD": "0.07001",
                        "SHIB-USD": "0.000011955",
                        "USDC-USD": "1.0",
                        "USDT-USD": "1.000245"
                    },
                    "offchain_eligible": false,
                    "organization_name": "Nodeme.net",
                    "payment_threshold": {
                        "overpayment_absolute_threshold": {
                            "amount": "5.00",
                            "currency": "USD"
                        },
                        "overpayment_relative_threshold": "0.005",
                        "underpayment_absolute_threshold": {
                            "amount": "5.00",
                            "currency": "USD"
                        },
                        "underpayment_relative_threshold": "0.005"
                    },
                    "local_exchange_rates": {
                        "APE-USD": "6.994",
                        "BCH-USD": "144.815",
                        "BTC-USD": "23662.575",
                        "DAI-USD": "1.00005",
                        "ETH-USD": "1704.455",
                        "LTC-USD": "61.695",
                        "DOGE-USD": "0.07001",
                        "SHIB-USD": "0.000011955",
                        "USDC-USD": "1.0",
                        "USDT-USD": "1.000245"
                    }
                },
                "id": "7ff7177a-bd38-46ca-b83a-6e9509367b20",
                "resource": "event",
                "type": "charge:created"
            },
            "id": "8d708598-dbf8-48e1-aa21-bd936b06c0c3",
            "scheduled_for": "2022-07-31T21:45:54Z"
        }';

        $payload = json_decode($f, true);

        dd($payload['event']['data']['checkout']['id']);
        dd($payload['event']['type']);
        dd($payload['event']['data']);
                // dump(unserialize('a:4:{s:6:"_token";s:40:"LejKxdBT8ZFEbFlmnuwdeQOwIjuXotyHuhHQ5dqx";s:6:"_flash";a:2:{s:3:"old";a:0:{}s:3:"new";a:0:{}}s:9:"_previous";a:1:{s:3:"url";s:32:"http://nodeme.net.test/dashboard";}s:50:"login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d";i:1;}'));
                return view('user.dashboard');
            }
        )->name('dashboard');
    
    
    // Products Routes
    Route::controller(ProductController::class)->prefix('products')->group(function(){
        // Display all products
        // products/list = products.list
        Route::get('/', 'index')->name('products');
        // products/{number}/add-to-cart = products.add_to_cart
        Route::get('{csrf_token}/{number}/add-to-cart', 'addToCart')->name('products.add_to_cart');
    });



    // Shopping cart routes
    Route::controller(CartController::class)->prefix('shopping-cart')->group(function(){
        // Display the shopping cart
        Route::get('/', 'index')->name('cart');
        // shopping_cart/remove/{id}  shopping_cart.remove_item
        Route::post('/remove-item', 'removeItem')->name('cart.remove_item');
        // shopping_cart/checkout  shopping_cart.checkout
        Route::get('/{csrf_token}/checkout', 'checkout')->name('cart.checkout');
    });


    // Inviting another people
    Route::controller(InvitationController::class)->group(function(){
        Route::get('invite' ,'create')->name('invitation');
        Route::post('invite' ,'invite');
        Route::get('/secret/{invited_by_hashId}/invite/{invited_by_uuid}');
    });

});
