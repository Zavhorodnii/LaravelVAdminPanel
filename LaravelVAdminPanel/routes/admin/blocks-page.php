<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/benefits',
        [\App\Http\Controllers\BenefitsController::class, 'get_all_benefits']
    )->name('all-benefits');

    Route::get('/text-block',
        [\App\Http\Controllers\TextBlockController::class, 'get_all_text_block']
    )->name('all-text-block');

    Route::get('/catalog',
        [\App\Http\Controllers\BlockCatalogController::class, 'get_all_catalog']
    )->name('all-catalog-page');

    Route::get('/guarantees',
        [\App\Http\Controllers\GuaranteesController::class, 'get_all_guarantees']
    )->name('guarantees-page');
    Route::get('/delivery-block',
        [\App\Http\Controllers\BlockDeliveryController::class, 'get_all_delivery_block']
    )->name('all-delivery-block-page');
    Route::get('/delivery-price',
        [\App\Http\Controllers\DeliveryPriceController::class, 'get_all_delivery_price']
    )->name('all-delivery-price-page');
    Route::get('/delivery-day',
        [\App\Http\Controllers\DeliveryWorkDayController::class, 'get_all_delivery_day']
    )->name('all-delivery-day-page');
    Route::get('/delivery-address',
        [\App\Http\Controllers\DeliveryWorkAddressController::class, 'get_all']
    )->name('all-delivery-address');
    Route::get('/gallery',
        [\App\Http\Controllers\BlockGalleryController::class, 'get_all']
    )->name('all-gallery-page');
    Route::get('/how-we-work',
        [\App\Http\Controllers\BlockHowWeWorkController::class, 'get_all_how_we_work']
    )->name('all-how-we-work-page');
    Route::get('/review-title',
        [\App\Http\Controllers\BlockReviewsController::class, 'get_all_review']
    )->name('all-review-title');
    Route::get('/text-review',
        [\App\Http\Controllers\TextReviewController::class, 'get_all_text_review']
    )->name('all-text-review');
    Route::get('/video-review',
        [\App\Http\Controllers\VideoReviewController::class, 'get_all_video_review']
    )->name('all-video-review');
    Route::get('/audio-review',
        [\App\Http\Controllers\AudioReviewController::class, 'get_all_audio_review']
    )->name('all-audio-review');
    Route::get('/products',
        [\App\Http\Controllers\ProductController::class, 'get_all']
    )->name('all-product');
    Route::get('/bestseller',
        [\App\Http\Controllers\BestsellerController::class, 'get_all']
    )->name('all-bestseller');
    Route::get('/gifts',
        [\App\Http\Controllers\BlockGiftsController::class, 'get_all']
    )->name('gift-page');
    Route::get('categories',
        [\App\Http\Controllers\CategoryController::class, 'get_all']
    )->name('all-categories');
    Route::get('/site-menu',
        [\App\Http\Controllers\SiteMenuController::class, 'get_all']
    )->name('site-menu-page');
    Route::get('/social-link',
        [\App\Http\Controllers\SocialLinkController::class, 'get_all']
    )->name('social-link-page');

    Route::prefix('create')->group(function (){
        Route::get('/catalog-item',
            [\App\Http\Controllers\BlockCatalogController::class, 'create_catalog_item']
        )->name('create-catalog-item');
        Route::get('/text-block',
            [\App\Http\Controllers\TextBlockController::class, 'create_text_block_item']
        )->name('create-text-block-item');
        Route::get('/text-review',
            [\App\Http\Controllers\TextReviewController::class, 'create_text_review_item']
        )->name('create-text-review-item');
        Route::get('/video-review',
            [\App\Http\Controllers\VideoReviewController::class, 'create_video_review_item']
        )->name('create-video-review-item');
        Route::get('/audio-review',
            [\App\Http\Controllers\AudioReviewController::class, 'create_audio_review_item']
        )->name('create-audio-review-item');
        Route::get('/delivery-price',
            [\App\Http\Controllers\DeliveryPriceController::class, 'create_delivery_price_item']
        )->name('create-delivery-price-item');
        Route::get('/create-product',
            [\App\Http\Controllers\ProductController::class, 'create_page']
        )->name('create-product');
        Route::get('/bestseller',
            [\App\Http\Controllers\BestsellerController::class, 'create_page']
        )->name('create-bestseller');
        Route::get('category',
            [\App\Http\Controllers\CategoryController::class, 'create_page']
        )->name('create-category');
    });

    Route::prefix('/update')->group(function(){
        Route::get('/catalog-item/{id}',
            [\App\Http\Controllers\BlockCatalogController::class, 'update_catalog_item']
        )->name('update_catalog_item');
        Route::get('/text-block-item/{id}',
            [\App\Http\Controllers\TextBlockController::class, 'update']
        )->name('update_text_block_item');
        Route::get('/text-review/{id}',
            [\App\Http\Controllers\TextReviewController::class, 'open_update']
        )->name('update_text_review_item');
        Route::get('/video-review/{id}',
            [\App\Http\Controllers\VideoReviewController::class, 'open_update']
        )->name('update_video_review_item');
        Route::get('/audio-review/{id}',
            [\App\Http\Controllers\AudioReviewController::class, 'open_update']
        )->name('update-audio-review-item');
        Route::get('/delivery-price/{id}',
            [\App\Http\Controllers\DeliveryPriceController::class, 'open_update']
        )->name('update-delivery-price-item');
        Route::get('/product/{id}',
            [\App\Http\Controllers\ProductController::class, 'update']
        )->name('update_product');
        Route::get('/bestseller/{id}',
            [\App\Http\Controllers\BestsellerController::class, 'update']
        )->name('update-bestseller');
        Route::get('/category/{id}',
            [\App\Http\Controllers\CategoryController::class, 'update']
        )->name('update-category');
    });

});


