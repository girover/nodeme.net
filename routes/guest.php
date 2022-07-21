<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
| Routes that do not require Authenticated user
*/

Route::middleware('guest')->group(function () {
    
});