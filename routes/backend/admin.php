<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\shop\ShopCategoryController;
use App\Http\Controllers\Backend\shop\ShopLocationController;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'Shop'], function () {
        //shop
        Route::resource('shop', 'ShopController');
        Route::resource('shopcategory', 'ShopCategoryController');
        Route::resource('geolocation', 'ShopLocationController');
        Route::resource('shopowner', 'ShopOwnerController');

    });

});