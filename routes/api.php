<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserReviewController;
use App\Models\UserReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('products', ProductController::class);
Route::middleware([])->group(function() {
    Route::get('products/{id}/related', [ProductController::class, 'getRelatedProducts']);
});

Route::apiResource('userReviews', UserReviewController::class)->middleware(['web']);
Route::middleware([])->group(function() {
    Route::get('userReviews/product/{product_id}', [UserReviewController::class, 'getReviewsByProduct']);
});