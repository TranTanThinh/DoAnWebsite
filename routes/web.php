<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/index', 'index');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/cart', 'cart')->name('cart');

    Route::get('/blogsingle', 'blogsingle')->name('blogsingle');
    Route::get('/productsingle', 'productsingle')->name('productsingle');

    // Route::get('/productsingle', 'productsingle')->name('productsingle');

    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/about', 'about')->name('about');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
    //search
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
});
Route::resource('/admin', AdminController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/category', CategoryController::class);

