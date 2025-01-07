<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserReviewController;

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
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::resource('products', ProductController::class);

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::resource('contacts', ContactController::class);


Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

Route::resource('user_reviews', UserReviewController::class);
Route::get('/reviews', [UserReviewController::class, 'index'])->name('user_reviews.index');