<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    [\App\Http\Controllers\FrontControllers\HomeController::class, 'get']
)->name('home-page');
