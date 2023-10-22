<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::middleware(['auth:api'])->group(function(){
//     Route::prefix('product')->group(function(){
//     });
// });

Route::prefix('product')->group(function(){
    Route::post('/', [ProductController::class, 'createProduct']);
    Route::get('/', [ProductController::class, 'listAllProducts']);
    Route::get('/{id}', [ProductController::class, 'listProduct']);
    Route::put('/{id}', [ProductController::class, 'updateProduct']);
    Route::delete('/{id}', [ProductController::class, 'deleteProduct']);
});