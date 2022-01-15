<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/benefits',
        [\App\Http\Controllers\Admin\BenefitsController::class, 'get_all_benefits']
    )->name('all-benefits');

    Route::get('/text-block',
        [\App\Http\Controllers\Admin\TextBlockController::class, 'get_all_text_block']
    )->name('all-text-block');

    Route::get('/catalog',
        [\App\Http\Controllers\Admin\BlockCatalogController::class, 'get_all_catalog']
    )->name('all-catalog-page');

    Route::get('/guarantees',
        [\App\Http\Controllers\Admin\GuaranteesController::class, 'get_all_guarantees']
    )->name('guarantees-page');
    Route::get('/delivery-block',
        [\App\Http\Controllers\Admin\BlockDeliveryController::class, 'get_all_delivery_block']
    )->name('all-delivery-block-page');
    Route::get('/delivery-price',
        [\App\Http\Controllers\Admin\DeliveryPriceController::class, 'get_all_delivery_price']
    )->name('all-delivery-price-page');
    Route::get('/delivery-day',
        [\App\Http\Controllers\Admin\DeliveryWorkDayController::class, 'get_all_delivery_day']
    )->name('all-delivery-day-page');
    Route::get('/delivery-address',
        [\App\Http\Controllers\Admin\DeliveryWorkAddressController::class, 'get_all']
    )->name('all-delivery-address');
    Route::get('/gallery',
        [\App\Http\Controllers\Admin\BlockGalleryController::class, 'get_all']
    )->name('all-gallery-page');
    Route::get('/how-we-work',
        [\App\Http\Controllers\Admin\BlockHowWeWorkController::class, 'get_all_how_we_work']
    )->name('all-how-we-work-page');
    Route::get('/review-title',
        [\App\Http\Controllers\Admin\BlockReviewsController::class, 'get_all_review']
    )->name('all-review-title');
    Route::get('/text-review',
        [\App\Http\Controllers\Admin\TextReviewController::class, 'get_all_text_review']
    )->name('all-text-review');
    Route::get('/video-review',
        [\App\Http\Controllers\Admin\VideoReviewController::class, 'get_all_video_review']
    )->name('all-video-review');
    Route::get('/audio-review',
        [\App\Http\Controllers\Admin\AudioReviewController::class, 'get_all_audio_review']
    )->name('all-audio-review');
    Route::get('/products',
        [\App\Http\Controllers\Admin\ProductController::class, 'get_all']
    )->name('all-product');
    Route::get('/bestseller',
        [\App\Http\Controllers\Admin\BestsellerController::class, 'get_all']
    )->name('all-bestseller');
    Route::get('/gifts',
        [\App\Http\Controllers\Admin\BlockGiftsController::class, 'get_all']
    )->name('gift-page');
    Route::get('categories',
        [\App\Http\Controllers\Admin\CategoryController::class, 'get_all']
    )->name('all-categories');
    Route::get('/site-menu',
        [\App\Http\Controllers\Admin\SiteMenuController::class, 'get_all']
    )->name('site-menu-page');
    Route::get('/social-link',
        [\App\Http\Controllers\Admin\SocialLinkController::class, 'get_all']
    )->name('social-link-page');
    Route::get('/payment',
        [\App\Http\Controllers\Admin\PaymentController::class, 'get_all']
    )->name('payment-page');
    Route::get('/settings-site',
        [\App\Http\Controllers\Admin\SettingsSiteController::class, 'get_all']
    )->name('settings-site-page');
    Route::get('/pages',
        [\App\Http\Controllers\Admin\PageController::class, 'get_all']
    )->name('all-pages-page');
    Route::get('/gift-set',
        [\App\Http\Controllers\Admin\GiftSetController::class, 'get_all']
    )->name('gift-set-page');

    Route::prefix('create')->group(function (){
        Route::get('/catalog-item',
            [\App\Http\Controllers\Admin\BlockCatalogController::class, 'create_catalog_item']
        )->name('create-catalog-item');
        Route::get('/text-block',
            [\App\Http\Controllers\Admin\TextBlockController::class, 'create_text_block_item']
        )->name('create-text-block-item');
        Route::get('/text-review',
            [\App\Http\Controllers\Admin\TextReviewController::class, 'create_text_review_item']
        )->name('create-text-review-item');
        Route::get('/video-review',
            [\App\Http\Controllers\Admin\VideoReviewController::class, 'create_video_review_item']
        )->name('create-video-review-item');
        Route::get('/audio-review',
            [\App\Http\Controllers\Admin\AudioReviewController::class, 'create_audio_review_item']
        )->name('create-audio-review-item');
        Route::get('/delivery-price',
            [\App\Http\Controllers\Admin\DeliveryPriceController::class, 'create_delivery_price_item']
        )->name('create-delivery-price-item');
        Route::get('/create-product',
            [\App\Http\Controllers\Admin\ProductController::class, 'create_page']
        )->name('create-product');
        Route::get('/bestseller',
            [\App\Http\Controllers\Admin\BestsellerController::class, 'create_page']
        )->name('create-bestseller');
        Route::get('category',
            [\App\Http\Controllers\Admin\CategoryController::class, 'create_page']
        )->name('create-category');
        Route::get('page',
            [\App\Http\Controllers\Admin\PageController::class, 'create_page']
        )->name('create-page');
    });

    Route::prefix('/update')->group(function(){
        Route::get('/catalog-item/{id}',
            [\App\Http\Controllers\Admin\BlockCatalogController::class, 'update_catalog_item']
        )->name('update_catalog_item');
        Route::get('/text-block-item/{id}',
            [\App\Http\Controllers\Admin\TextBlockController::class, 'update']
        )->name('update_text_block_item');
        Route::get('/text-review/{id}',
            [\App\Http\Controllers\Admin\TextReviewController::class, 'open_update']
        )->name('update_text_review_item');
        Route::get('/video-review/{id}',
            [\App\Http\Controllers\Admin\VideoReviewController::class, 'open_update']
        )->name('update_video_review_item');
        Route::get('/audio-review/{id}',
            [\App\Http\Controllers\Admin\AudioReviewController::class, 'open_update']
        )->name('update-audio-review-item');
        Route::get('/delivery-price/{id}',
            [\App\Http\Controllers\Admin\DeliveryPriceController::class, 'open_update']
        )->name('update-delivery-price-item');
        Route::get('/product/{id}',
            [\App\Http\Controllers\Admin\ProductController::class, 'update']
        )->name('update_product');
        Route::get('/bestseller/{id}',
            [\App\Http\Controllers\Admin\BestsellerController::class, 'update']
        )->name('update-bestseller');
        Route::get('/category/{id}',
            [\App\Http\Controllers\Admin\CategoryController::class, 'update']
        )->name('update-category');
        Route::get('/page/{id}',
            [\App\Http\Controllers\Admin\PageController::class, 'update']
        )->name('update-page');
    });

});


