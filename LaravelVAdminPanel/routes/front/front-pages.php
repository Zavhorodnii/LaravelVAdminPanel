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
        [\App\Http\Controllers\FrontControllers\HomeController::class, 'get']
    )->name('product-page');

});

//Route::get('/product/{slug}',
//
//)->name('product-page');
