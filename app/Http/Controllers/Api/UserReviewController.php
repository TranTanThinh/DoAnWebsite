<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserReview;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{

    public function getReviewsByProduct($product_id) {
        $reviews = UserReview::where('orderedProductID', '=', $product_id)
            ->with(['user:id,firstName,lastName'])
            ->latest()
            ->paginate(4);
            // ->get();

        return response()->json([
            'success' => true,
            'message' => 'Reviews List',
            'data' => $reviews
        ]);
    }

    public function index() {
        $reviews = UserReview::latest()->get();

        return response()->json($reviews);
    }
}
