<?php

namespace App\Http\Controllers\Api;

use App\Events\ReviewPosted;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\UserReview;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserReviewController extends Controller
{

    public function getReviewsByProduct($product_id)
    {
        $reviews = UserReview::where('orderedProductID', '=', $product_id)
            ->with(['user:id,firstName,lastName'])
            ->latest()
            ->paginate(10);
        // ->get();

        $avgRating = UserReview::where('orderedProductID', '=', $product_id)
            ->average('rating');

        $ratingDistribution = UserReview::where('orderedProductID', '=', $product_id)
            ->selectRaw('rating, count(*) as count')
            ->groupBy('rating')
            ->orderBy('rating', 'desc')
            ->get();

        $totalReviews = UserReview::where('orderedProductID', '=', $product_id)->count();

        return response()->json([
            'success' => true,
            'message' => 'Reviews List',
            'data' => [
                'reviews' => $reviews,
                'average_rating' => round($avgRating, 1),
                'rating_distribution' => $ratingDistribution,
                'total_reviews' => $totalReviews,
            ],
        ]);
    }

    public function index()
    {
        $reviews = UserReview::latest()->get();
        // $existUserReviewed = UserReview::where('userID', '=', 3)
        //         ->where('orderedProductId', '=', 8)
        //         ->get();
        // dd($existUserReviewed);
        // dd($existUserReviewed->isNotEmpty());

        return response()->json($reviews);
    }

    public function store(Request $request)
    {

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required',
            'productId' => 'required|integer',
        ]);


        // not login => null, use guard web because you call its api from web.
        // If use directly api guard, you must create token

        $currentUser = Auth::user();
        $userId = data_get($currentUser, 'id');
        $currentProductIdOnWeb = $request->input('productId');

        $existUserPurchased = DB::table('orders')
            ->join('order__items', 'orders.id', '=', 'order__items.orderId')
            ->select('orders.uid', 'orders.id', 'orders.status', 'order__items.productId')
            ->where('orders.uid', '=', $userId)
            ->where('order__items.productId', '=', $currentProductIdOnWeb)
            ->get();

        $status = $existUserPurchased->first()->status ?? "No status";
        $currentUserName = data_get($currentUser, 'username');

        $existUserReviewed = UserReview::where('userID', '=', $userId)
                    ->where('orderedProductId', '=', $currentProductIdOnWeb)
                    ->get();
        if($existUserReviewed->isNotEmpty()) {
            return response()->json([
                'message' => 'This product has been reviewed'
            ], 422);
        }
        // dd(gettype(!$existUserReviewed));
        // dd(gettype($existUserPurchased));
        // dd(strtolower($status));
        // dd(!$existUserPurchased -> isEmpty() && strtolower($status) === "completed");
        if (!$existUserPurchased->isEmpty() && strtolower($status) === "completed") {

            $userReview = new UserReview();
            $userReview->setUserID($userId);
            $userReview->setOrderedProductID($currentProductIdOnWeb);
            $userReview->setRating($request->input('rating'));
            $userReview->setComment($request->input('comment'));

            $userReview->save();

            $avgRating = UserReview::where('orderedProductID', '=', $userReview->getOrderedProductID())
                ->average('rating');

            $ratingDistribution = UserReview::selectRaw('rating, count(*) as count')
                ->where('orderedProductID', '=', $userReview->getOrderedProductID()) 
                ->groupBy('rating')
                ->orderBy('rating', 'desc')
                ->get();

            // if ($ratingDistribution->isEmpty()) {
            //     Log::info('Rating Distribution is empty', [
            //         'orderedProductID' => $userReview->getOrderedProductID(),
            //         'ratings' => UserReview::where('orderedProductID', '=', $userReview->getOrderedProductID())->pluck('rating'),
            //     ]);
            // }

            $totalReviews = UserReview::where('orderedProductID', '=', $userReview->getOrderedProductID())->count();

            $newReview = $userReview->load('user:id,firstName,lastName');

            $ratingDistribution = $ratingDistribution->toArray();

            broadcast(new ReviewPosted($newReview, $ratingDistribution, $totalReviews, $avgRating));

            return response()->json([
                'message' => 'Review Successfully',
                'currentUserId' => $userId,
                'currentUserName' => $currentUserName,
                'data' => $existUserPurchased,
                'currentProductOnWeb' => $currentProductIdOnWeb,
                'ratingDistribution' => $ratingDistribution,
                'avgRating' => $avgRating,
                'totalReviews' => $totalReviews,
                'newReview' => $newReview,
            ], 200);
        } else {
            return response()->json([
                'message' => 'You cannot Review this product',
                'currentUserName' => $currentUserName,
                'currentUserId' => $userId,
                'data' => $existUserPurchased,
                'currentProductOnWeb' => $currentProductIdOnWeb,
            ], 422);
        }
    }
}
