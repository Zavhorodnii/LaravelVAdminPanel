<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/all-gifts',
        [\App\Http\Controllers\BlockGiftsController::class, 'get_all_gifts']
    )->name('all-gifts-page');
    Route::get('/ads',
        [\App\Http\Controllers\BlockAdsController::class, 'get_all_ads']
    )->name('all-ads-page');
    Route::get('/bestsellers',
        [\App\Http\Controllers\BlockBestsellersController::class, 'get_all_bestsellers']
    )->name('all-bestsellers-page');
    Route::get('/catalog',
        [\App\Http\Controllers\BlockCatalogController::class, 'get_all_catalog']
    )->name('all-catalog-page');
    Route::get('/delivery',
        [\App\Http\Controllers\BlockDeliveryController::class, 'get_all_delivery']
    )->name('all-delivery-page');
    Route::get('/feedback',
        [\App\Http\Controllers\BlockFeedbackController::class, 'get_all_feedback']
    )->name('all-feedback-page');
    Route::get('/gallery',
        [\App\Http\Controllers\BlockGalleryController::class, 'get_all_gallery']
    )->name('all-gallery-page');
    Route::get('/how-we-work',
        [\App\Http\Controllers\BlockHowWeWorkController::class, 'get_all_how_we_work']
    )->name('all-how-we-work-page');


    Route::prefix('guarantees')->group(function(){
        Route::get('/',
            [\App\Http\Controllers\GuaranteesController::class, 'get_all_guarantees']
        )->name('guarantees-page');
//        Route::get('/create',
//            [\App\Http\Controllers\BlockReturnController::class, 'create_return_block']
//        )->name('create-return-block');
//        Route::get('/edit/{id}',
//            [\App\Http\Controllers\BlockReturnController::class, 'edit_return_item']
//        )->name('edit-return-block');
    });


    Route::prefix('products')->group(function(){
        Route::get('/',
            [\App\Http\Controllers\ProductController::class, 'all_products']
        )->name('all-products');
        Route::get('/create',
            [\App\Http\Controllers\ProductController::class, 'create_product']
        )->name('create-product');
    });


    Route::get('/review',
        [\App\Http\Controllers\BlockReviewsController::class, 'get_all_review']
    )->name('all-review-page');
    Route::get('/stock-kits',
        [\App\Http\Controllers\BlockStockKitsController::class, 'get_all_stock_kits']
    )->name('all-stock-kits-page');



    Route::prefix('create')->group(function (){
        Route::get('/catalog-item',
            [\App\Http\Controllers\BlockCatalogController::class, 'create_catalog_item']
        )->name('create-catalog-item');
        Route::get('/product',
            [\App\Http\Controllers\ProductController::class, 'create_product_item']
        )->name('create-product-item');
    });
});


