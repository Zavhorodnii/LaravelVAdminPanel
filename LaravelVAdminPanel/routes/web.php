<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    return "Main page";
});

Route::get('/admin', function () {
    return view('admin/admin');
})->name('admin');

Route::post('/admin/check',
    [\App\Http\Controllers\AdminLoginController::class, 'admin_check']
)->name('admin-check');

Route::get('/admin/panel', function (){
    return view('admin/index');
})->name('admin-panel')->middleware('auth');

Route::get('/admin/pages',
        [\App\Http\Controllers\PagesController::class, 'all_pages']
)->name('all_pages')->middleware('auth');

Route::get('/admin/all-gifts',
        [\App\Http\Controllers\BlockGiftsController::class, 'get_all_gifts']
)->name('all-gifts-page')->middleware('auth');
Route::get('/admin/ads',
        [\App\Http\Controllers\BlockAdsController::class, 'get_all_ads']
)->name('all-ads-page')->middleware('auth');
Route::get('/admin/bestsellers',
        [\App\Http\Controllers\BlockBestsellersController::class, 'get_all_bestsellers']
)->name('all-bestsellers-page')->middleware('auth');
Route::get('/admin/catalog',
        [\App\Http\Controllers\BlockCatalogController::class, 'get_all_catalog']
)->name('all-catalog-page')->middleware('auth');
Route::get('/admin/delivery',
        [\App\Http\Controllers\BlockDeliveryController::class, 'get_all_delivery']
)->name('all-delivery-page')->middleware('auth');
Route::get('/admin/feedback',
        [\App\Http\Controllers\BlockFeedbackController::class, 'get_all_feedback']
)->name('all-feedback-page')->middleware('auth');
Route::get('/admin/gallery',
        [\App\Http\Controllers\BlockGalleryController::class, 'get_all_gallery']
)->name('all-gallery-page')->middleware('auth');
Route::get('/admin/how-we-work',
        [\App\Http\Controllers\BlockHowWeWorkController::class, 'get_all_how_we_work']
)->name('all-how-we-work-page')->middleware('auth');
Route::get('/admin/return',
        [\App\Http\Controllers\BlockReturnController::class, 'get_all_return']
)->name('all-return-page')->middleware('auth');
Route::get('/admin/review',
        [\App\Http\Controllers\BlockReviewsController::class, 'get_all_review']
)->name('all-review-page')->middleware('auth');
Route::get('/admin/stock-kits',
        [\App\Http\Controllers\BlockStockKitsController::class, 'get_all_stock_kits']
)->name('all-stock-kits-page')->middleware('auth');
