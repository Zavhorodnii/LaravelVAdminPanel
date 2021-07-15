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

Route::prefix('create')->group(function (){
    Route::post('/return-item',
        [\App\Http\Controllers\BlockReturnController::class, 'create_return_item']
    )->name('create-return-item');
});

Route::prefix('update')->group(function (){
    Route::post('/return-item',
        [\App\Http\Controllers\BlockReturnController::class, 'update_return_item']
    )->name('update-return-item');
});

Route::prefix('delete')->group(function (){
    Route::post('/return-item',
        [\App\Http\Controllers\BlockReturnController::class, 'delete_return_item']
    )->name('delete-return-item');
});

Route::post('change-draft',
    [\App\Http\Controllers\BlockReturnController::class, 'change_draft_return_item']
)->name('change-draft-status');
