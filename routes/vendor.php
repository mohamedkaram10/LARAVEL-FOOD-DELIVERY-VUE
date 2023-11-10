<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\MenuController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\CategoryController;




Route::group([
    'prefix'     => 'vendor',
    'as'         => 'vendor.',
    'middleware' => ['auth'],
], function () {
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
