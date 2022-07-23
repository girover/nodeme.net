<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


//Capturing Webhook that is sent to this endpoint.
Route::controller(WebhookController::class)->group(function(){
    Route::post('webhook', 'capture')->name('webhook');
});

require __DIR__.'/guest.php';
require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
