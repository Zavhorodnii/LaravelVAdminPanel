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



Route::name('cart')->prefix('cart')->group( function (){
    Route::get('/',
        [\App\Http\Controllers\FrontControllers\CartPageController::class, 'get']
    )->name('.page');

    Route::post('/control',
        [\App\Http\Controllers\FrontControllers\CartController::class, 'addToCart']
    )->name('.control');

    Route::post('/change-quantity',
        [\App\Http\Controllers\FrontControllers\CartController::class, 'changeQuantity']
    )->name('.change.quantity');

    Route::post('/remove',
        [\App\Http\Controllers\FrontControllers\CartController::class, 'removeProduct']
    )->name('.remove');

    Route::post('/gift',
        [\App\Http\Controllers\FrontControllers\CartController::class, 'gift']
    )->name('.gift');

    Route::post('/order',
        [\App\Http\Controllers\FrontControllers\CartController::class, 'order']
    )->name('.order');
});
