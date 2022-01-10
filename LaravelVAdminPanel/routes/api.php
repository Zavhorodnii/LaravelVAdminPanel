<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('upload')->group(function (){

    Route::post('/file',
        [\App\Http\Controllers\FileController::class, 'upload_file']
    )->name('upload-file');

    Route::post('/get-selected-info',
        [\App\Http\Controllers\FileController::class, 'get_selected_info']
    )->name('get-selected-info');

    Route::post('/update-file-info',
        [\App\Http\Controllers\FileController::class, 'update_file_info']
    )->name('update-file-info');

    Route::post('/delete-selected-file',
        [\App\Http\Controllers\FileController::class, 'delete_selected_file']
    )->name('delete-selected-file');
});


Route::prefix('create-block')->group(function (){
    Route::post('/guarantees',
        [\App\Http\Controllers\GuaranteesController::class, 'edit_block_guarantees']
    )->name('edit-block-guarantees');
    Route::post('/catalog',
        [\App\Http\Controllers\BlockCatalogController::class, 'create']
    )->name('create_block_catalog');
    Route::post('/text-block',
        [\App\Http\Controllers\TextBlockController::class, 'create']
    )->name('create_text_block');
    Route::post('/benefits',
        [\App\Http\Controllers\BenefitsController::class, 'update']
    )->name('create-benefits');
    Route::post('/review-title',
        [\App\Http\Controllers\BlockReviewsController::class, 'update']
    )->name('edit-review-title');
    Route::post('/text-review',
        [\App\Http\Controllers\TextReviewController::class, 'create_update']
    )->name('create-text-review');
    Route::post('/video-review',
        [\App\Http\Controllers\VideoReviewController::class, 'create_update']
    )->name('create-video-review');
    Route::post('/audio-review',
        [\App\Http\Controllers\AudioReviewController::class, 'create_update']
    )->name('create-audio-review');
    Route::post('/how-we-work',
        [\App\Http\Controllers\BlockHowWeWorkController::class, 'edit_block_how_we_work']
    )->name('edit-how-we-work');
    Route::post('/delivery-block',
        [\App\Http\Controllers\BlockDeliveryController::class, 'edit_delivery_block']
    )->name('edit-delivery-block');
    Route::post('/delivery-price',
        [\App\Http\Controllers\DeliveryPriceController::class, 'create']
    )->name('create-delivery-price');
    Route::post('/delivery-day',
        [\App\Http\Controllers\DeliveryWorkDayController::class, 'edit']
    )->name('edit-delivery-day');
    Route::post('/delivery-address',
        [\App\Http\Controllers\DeliveryWorkAddressController::class, 'edit']
    )->name('edit-delivery-address');
    Route::post('/gallery',
        [\App\Http\Controllers\BlockGalleryController::class, 'edit']
    )->name('edit-gallery');
    Route::post('/create-product',
        [\App\Http\Controllers\ProductController::class, 'create']
    )->name('create-product-item');
    Route::post('/bestseller',
        [\App\Http\Controllers\BestsellerController::class, 'create']
    )->name('create-bestseller-item');
    Route::post('edit-gift',
       [\App\Http\Controllers\BlockGiftsController::class, 'create']
    )->name('edit-gift-block');
    Route::post('category',
       [\App\Http\Controllers\CategoryController::class, 'create']
    )->name('create-category-item');
    Route::post('/site-menu',
        [\App\Http\Controllers\SiteMenuController::class, 'edit']
    )->name('edit-site-menu');
    Route::post('/social-link',
        [\App\Http\Controllers\SocialLinkController::class, 'edit']
    )->name('edit-social-link');
});


Route::prefix('delete')->group(function (){
    Route::post('/catalog-item',
        [\App\Http\Controllers\BlockCatalogController::class, 'delete_item']
    )->name('delete_catalog_item');
    Route::post('/text-block',
        [\App\Http\Controllers\TextBlockController::class, 'delete']
    )->name('delete_text_block');
    Route::post('/text-review',
        [\App\Http\Controllers\TextReviewController::class, 'delete']
    )->name('delete_text_review');
    Route::post('/video-review',
        [\App\Http\Controllers\VideoReviewController::class, 'delete']
    )->name('delete-video-review');
    Route::post('/audio-review',
        [\App\Http\Controllers\AudioReviewController::class, 'delete']
    )->name('delete-audio-review');
    Route::post('/delivery-price',
        [\App\Http\Controllers\DeliveryPriceController::class, 'delete']
    )->name('delete-delivery-price');
    Route::post('product',
        [\App\Http\Controllers\ProductController::class, 'delete']
    )->name('delete-product');
    Route::post('bestseller',
        [\App\Http\Controllers\BestsellerController::class, 'delete']
    )->name('delete-bestseller');
    Route::post('category',
        [\App\Http\Controllers\CategoryController::class, 'delete']
    )->name('delete-category');
});


Route::prefix('change-draft')->group(function(){
    Route::post('/catalog-item',
        [\App\Http\Controllers\BlockCatalogController::class, 'change_draft_catalog_item']
    )->name('change_draft_catalog_item');
    Route::post('/text-block',
        [\App\Http\Controllers\TextBlockController::class, 'change_draft']
    )->name('change_draft_text_block');
    Route::post('/text-review',
        [\App\Http\Controllers\TextReviewController::class, 'change_draft']
    )->name('change_draft_text_review');
    Route::post('/video-review',
        [\App\Http\Controllers\VideoReviewController::class, 'change_draft']
    )->name('change_draft_video_review');
    Route::post('/audio-review',
        [\App\Http\Controllers\AudioReviewController::class, 'change_draft']
    )->name('change-draft-audio-review');
    Route::post('/delivery-price',
        [\App\Http\Controllers\DeliveryPriceController::class, 'change_draft']
    )->name('change-draft-delivery-controller');
    Route::post('/product',
        [\App\Http\Controllers\ProductController::class, 'change_draft']
    )->name('product-draft');
    Route::post('/bestseller',
        [\App\Http\Controllers\BestsellerController::class, 'change_draft']
    )->name('bestseller-draft');
});
