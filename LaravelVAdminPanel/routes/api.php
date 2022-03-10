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
        [\App\Http\Controllers\Admin\FileController::class, 'upload_file']
    )->name('upload-file');

    Route::post('/get-selected-info',
        [\App\Http\Controllers\Admin\FileController::class, 'get_selected_info']
    )->name('get-selected-info');

    Route::post('/update-file-info',
        [\App\Http\Controllers\Admin\FileController::class, 'update_file_info']
    )->name('update-file-info');

    Route::post('/delete-selected-file',
        [\App\Http\Controllers\Admin\FileController::class, 'delete_selected_file']
    )->name('delete-selected-file');
});


Route::prefix('create-block')->group(function (){
    Route::post('/guarantees',
        [\App\Http\Controllers\Admin\GuaranteesController::class, 'edit_block_guarantees']
    )->name('edit-block-guarantees');
    Route::post('/catalog',
        [\App\Http\Controllers\Admin\BlockCatalogController::class, 'create']
    )->name('create_block_catalog');
    Route::post('/text-block',
        [\App\Http\Controllers\Admin\TextBlockController::class, 'create']
    )->name('create_text_block');
    Route::post('/benefits',
        [\App\Http\Controllers\Admin\BenefitsController::class, 'update']
    )->name('create-benefits');
    Route::post('/review-title',
        [\App\Http\Controllers\Admin\BlockReviewsController::class, 'update']
    )->name('edit-review-title');
    Route::post('/text-review',
        [\App\Http\Controllers\Admin\TextReviewController::class, 'create_update']
    )->name('create-text-review');
    Route::post('/video-review',
        [\App\Http\Controllers\Admin\VideoReviewController::class, 'create_update']
    )->name('create-video-review');
    Route::post('/audio-review',
        [\App\Http\Controllers\Admin\AudioReviewController::class, 'create_update']
    )->name('create-audio-review');
    Route::post('/how-we-work',
        [\App\Http\Controllers\Admin\BlockHowWeWorkController::class, 'edit_block_how_we_work']
    )->name('edit-how-we-work');
    Route::post('/delivery-block',
        [\App\Http\Controllers\Admin\BlockDeliveryController::class, 'edit_delivery_block']
    )->name('edit-delivery-block');
    Route::post('/delivery-price',
        [\App\Http\Controllers\Admin\DeliveryPriceController::class, 'create']
    )->name('create-delivery-price');
    Route::post('/delivery-day',
        [\App\Http\Controllers\Admin\DeliveryWorkDayController::class, 'edit']
    )->name('edit-delivery-day');
    Route::post('/delivery-address',
        [\App\Http\Controllers\Admin\DeliveryWorkAddressController::class, 'edit']
    )->name('edit-delivery-address');
    Route::post('/gallery',
        [\App\Http\Controllers\Admin\BlockGalleryController::class, 'edit']
    )->name('edit-gallery');
    Route::post('/create-product',
        [\App\Http\Controllers\Admin\ProductController::class, 'create']
    )->name('create-product-item');
    Route::post('/bestseller',
        [\App\Http\Controllers\Admin\BestsellerController::class, 'create']
    )->name('create-bestseller-item');
    Route::post('edit-gift',
       [\App\Http\Controllers\Admin\BlockGiftsController::class, 'create']
    )->name('edit-gift-block');
    Route::post('category',
       [\App\Http\Controllers\Admin\CategoryController::class, 'create']
    )->name('create-category-item');
    Route::post('/site-menu',
        [\App\Http\Controllers\Admin\SiteMenuController::class, 'edit']
    )->name('edit-site-menu');
    Route::post('/social-link',
        [\App\Http\Controllers\Admin\SocialLinkController::class, 'edit']
    )->name('edit-social-link');
    Route::post('/payment',
        [\App\Http\Controllers\Admin\PaymentController::class, 'edit']
    )->name('edit-payment');
    Route::post('/settings-site',
        [\App\Http\Controllers\Admin\SettingsSiteController::class, 'edit']
    )->name('edit-settings-site');
    Route::post('/page',
        [\App\Http\Controllers\Admin\PageController::class, 'create']
    )->name('create-page-item');
    Route::post('edit-gift-set',
        [\App\Http\Controllers\Admin\GiftSetController::class, 'create']
    )->name('edit-gift-set');
    Route::post('hurry-up-to-buy',
        [\App\Http\Controllers\Admin\HurryUpToBuyController::class, 'create']
    )->name('edit-hurry-up-block');
});


Route::prefix('delete')->group(function (){
    Route::post('/catalog-item',
        [\App\Http\Controllers\Admin\BlockCatalogController::class, 'delete_item']
    )->name('delete_catalog_item');
    Route::post('/text-block',
        [\App\Http\Controllers\Admin\TextBlockController::class, 'delete']
    )->name('delete_text_block');
    Route::post('/text-review',
        [\App\Http\Controllers\Admin\TextReviewController::class, 'delete']
    )->name('delete_text_review');
    Route::post('/video-review',
        [\App\Http\Controllers\Admin\VideoReviewController::class, 'delete']
    )->name('delete-video-review');
    Route::post('/audio-review',
        [\App\Http\Controllers\Admin\AudioReviewController::class, 'delete']
    )->name('delete-audio-review');
    Route::post('/delivery-price',
        [\App\Http\Controllers\Admin\DeliveryPriceController::class, 'delete']
    )->name('delete-delivery-price');
    Route::post('product',
        [\App\Http\Controllers\Admin\ProductController::class, 'delete']
    )->name('delete-product');
    Route::post('bestseller',
        [\App\Http\Controllers\Admin\BestsellerController::class, 'delete']
    )->name('delete-bestseller');
    Route::post('category',
        [\App\Http\Controllers\Admin\CategoryController::class, 'delete']
    )->name('delete-category');
    Route::post('page',
        [\App\Http\Controllers\Admin\PageController::class, 'delete']
    )->name('delete-page');
});


Route::prefix('change-draft')->group(function(){
    Route::post('/catalog-item',
        [\App\Http\Controllers\Admin\BlockCatalogController::class, 'change_draft_catalog_item']
    )->name('change_draft_catalog_item');
    Route::post('/text-block',
        [\App\Http\Controllers\Admin\TextBlockController::class, 'change_draft']
    )->name('change_draft_text_block');
    Route::post('/text-review',
        [\App\Http\Controllers\Admin\TextReviewController::class, 'change_draft']
    )->name('change_draft_text_review');
    Route::post('/video-review',
        [\App\Http\Controllers\Admin\VideoReviewController::class, 'change_draft']
    )->name('change_draft_video_review');
    Route::post('/audio-review',
        [\App\Http\Controllers\Admin\AudioReviewController::class, 'change_draft']
    )->name('change-draft-audio-review');
    Route::post('/delivery-price',
        [\App\Http\Controllers\Admin\DeliveryPriceController::class, 'change_draft']
    )->name('change-draft-delivery-controller');
    Route::post('/product',
        [\App\Http\Controllers\Admin\ProductController::class, 'change_draft']
    )->name('product-draft');
    Route::post('/bestseller',
        [\App\Http\Controllers\Admin\BestsellerController::class, 'change_draft']
    )->name('bestseller-draft');
});


Route::prefix('front')->group(function (){

    Route::post('/add-review',
        [\App\Http\Controllers\FrontControllers\AddReviewController::class, 'set_review']
    )->name('front-add-review');

    Route::post('/sendmail',
        [\App\Http\Controllers\FrontControllers\ConsultationController::class, 'sendMail']
    )->name('front-send-mail');

});

//Route::name('cart')->prefix('cart')->group( function (){
//    Route::post('/control',
//        [\App\Http\Controllers\FrontControllers\AddCartController::class, 'cartControl']
//    )->name('.control');
//});
