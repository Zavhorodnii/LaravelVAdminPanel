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


//Route::prefix('edit-block')->group(function (){
//});

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
    )->name('create_benefits');
    Route::post('/benefits',
        [\App\Http\Controllers\BlockReviewsController::class, 'update']
    )->name('edit-review-title');
});


Route::prefix('delete')->group(function (){
    Route::post('/catalog-item',
        [\App\Http\Controllers\BlockCatalogController::class, 'delete_item']
    )->name('delete_catalog_item');
    Route::post('/text-block',
        [\App\Http\Controllers\TextBlockController::class, 'delete']
    )->name('delete_text_block');
});


Route::prefix('change-draft')->group(function(){
    Route::post('/catalog-item',
        [\App\Http\Controllers\BlockCatalogController::class, 'change_draft_catalog_item']
    )->name('change_draft_catalog_item');
    Route::post('/text-block',
        [\App\Http\Controllers\TextBlockController::class, 'change_draft']
    )->name('change_draft_text_block');
});
