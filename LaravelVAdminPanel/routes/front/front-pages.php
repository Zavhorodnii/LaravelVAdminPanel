<?php

use Illuminate\Support\Facades\Route;

//Route::get('/',
//    [\App\Http\Controllers\FrontControllers\HomeController::class, 'get']
//)->name('home-page');

Route::prefix('/')->group(function (){

    Route::get('',
        [\App\Http\Controllers\FrontControllers\HomeController::class, 'get']
    )->name('home-page');

    Route::get('product/{slug}',
        [\App\Http\Controllers\FrontControllers\ProductPageController::class, 'get']
    )->name('product-page');

});


Route::post('/cart',
    [\App\Http\Controllers\FrontControllers\CartPageController::class, 'get']
)->name('cart.page');
