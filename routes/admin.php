<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Routes that require Authenticated user
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
    
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/secret/{invited_by_hashId}/invite/{invited_by_uuid}');
});
