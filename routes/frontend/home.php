<?php

use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Product\ProductController;
use App\Http\Controllers\Frontend\Shop\ShopController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\User\ProfileController;
use Illuminate\Support\Facades\Route;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});

//shop route
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'Shop'], function () {
        //shop
        Route::resource('shop', 'ShopController');
        Route::resource('shopcategory', 'ShopCategoryController');
        Route::resource('geolocation', 'ShopLocationController');
        Route::resource('shopowner', 'ShopOwnerController');


        //added route to resource Controller
        /////////////////////////////////////////////////
        //add to ShopController
        Route::post('shop/location', [ShopController::class, 'addLocation'])->name('addLocation');
        //added to home controller
        Route::get('/shop/location/all', [HomeController::class, 'getShopLocation'])->name('getallshops');
    });
});

Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'Product'], function () {

        Route::resource('product', 'ProductController');
        Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
        Route::get('product/detail/{id}', ['uses' => 'ProductController@detail'])->name('productDetail');
        Route::patch('product/update/{id}', [ProductController::class, 'update'])->name('productUpdate');

    });
});
