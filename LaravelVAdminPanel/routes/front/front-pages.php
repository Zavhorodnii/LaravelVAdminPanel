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
        [\App\Http\Controllers\FrontControllers\AddCartController::class, 'cartControl']
    )->name('.control');
});
