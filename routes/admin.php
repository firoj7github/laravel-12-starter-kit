<?php

use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here you can register admin routes for your application.
| Now create something amazing!
|
*/



Route::middleware('admin.access')->prefix('admin')->name('admin.')->group(function () {
    
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });
});
