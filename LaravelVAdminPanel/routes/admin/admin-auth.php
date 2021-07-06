<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('admin/admin');
})->name('admin');


Route::prefix('admin')->group(function(){

    Route::post('/auth',
        [\App\Http\Controllers\AdminLoginController::class, 'admin_check']
    )->name('admin-auth');

    Route::get('/panel', function (){
        return view('admin/index');
    })->name('admin-panel');

    Route::get('/pages',
        [\App\Http\Controllers\PagesController::class, 'all_pages']
    )->name('all_pages');
});


