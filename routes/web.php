<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisingAndPromotionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
//Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ProductController::class)->group(function () {
    route::get('/shop', 'index')->name('product.index');
    route::get('products/{slug}/{id}', 'show')->name('product.show');
});

Route::controller(CartController::class)->group(function() {
    route::get('/cart', 'index')->name('cart.index');
    route::get('/cart/delete','delete')->name('cart.delete');
    route::post('/cart/add/{id}','add')->name('cart.add');
});


Route::controller(WishlistController::class)->group(function() {
    route::get('/wishlist', 'index')->name('wishlist.index');
    route::post('/wishlist/add/{id}', 'add')->name('wishlist.add');
});


//route slideshow
Route::get('/advertising-1', [AdvertisingAndPromotionController::class, 'showadvertising1'])->name('advertising-1');
Route::get('/advertising-2', [AdvertisingAndPromotionController::class, 'showadvertising2'])->name('advertising-2');
Route::get('/promotion-1', [AdvertisingAndPromotionController::class, 'showpromotion1'])->name('promotion-1');
Route::get('/promotion-2', [AdvertisingAndPromotionController::class, 'showpromotion2'])->name('promotion-2');