<?php

use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = \App\Models\Category::query()->get();
    $products = \App\Models\Product::query()->get();
    return view('welcome',compact('categories','products'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [PermissionController::class,'Permission']);
Route::get('product/create', [\App\Http\Controllers\ProductController::class,'create'])->name('product.create');
Route::get('product/{productId}', [\App\Http\Controllers\ProductController::class,'show'])->name('product.show');
Route::get('category/{categoryId}', [\App\Http\Controllers\ProductController::class,'categoryShow'])->name('category.show');
Route::get('category/product/{productId}', [\App\Http\Controllers\ProductController::class,'removeCategory'])->name('category.product.delete');
Route::get('product/sync/{productId}', [\App\Http\Controllers\ProductController::class,'syncProductWithCategory'])->name('category.product.sync');
