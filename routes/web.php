<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/index', 'index');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/blogsingle', 'blogsingle')->name('blogsingle');
    Route::get('/productsingle', 'productsingle')->name('productsingle');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/about', 'about')->name('about');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
});
Route::resource('/admin', AdminController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
