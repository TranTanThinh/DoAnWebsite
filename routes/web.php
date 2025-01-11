<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;



use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserReviewController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdvertisingAndPromotionController;


use App\Http\Controllers\Auth\RegisterController;



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

    Route::get('/search', [ProductController::class, 'search'])->name('product.search');

});
Route::resource('/admin', AdminController::class);

Route::resource('/orders', OrderController::class);
Route::resource('/category', CategoryController::class);




Auth::routes();

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
//Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


//route slideshow
Route::get('/advertising-1', [AdvertisingAndPromotionController::class, 'showadvertising1'])->name('advertising-1');
Route::get('/advertising-2', [AdvertisingAndPromotionController::class, 'showadvertising2'])->name('advertising-2');
Route::get('/promotion-1', [AdvertisingAndPromotionController::class, 'showpromotion1'])->name('promotion-1');
Route::get('/promotion-2', [AdvertisingAndPromotionController::class, 'showpromotion2'])->name('promotion-2');

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
    route::get('/wishlist', 'index')->name('wislist.index');
    route::post('/wishlist/add/{id}', 'add')->name('wishlist.add');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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




