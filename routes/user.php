<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebhookController;
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


    //Capturing Webhook that is sent to this endpoint.
    Route::controller(WebhookController::class)->group(function(){
        Route::post('webhook', 'capture')->name('webhook');
    });

});
