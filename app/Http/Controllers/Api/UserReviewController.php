<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\UserReview;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserReviewController extends Controller
{

    public function getReviewsByProduct($product_id)
    {
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

    public function index()
    {
        $reviews = UserReview::latest()->get();
        
        
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
        // $currentUser = Auth::user();
        // $userId = data_get($currentUser, 'id');
        // $currentProductOnWeb = $request->input('productId');

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
            // dd(gettype($existUserPurchased));
            // dd(strtolower($status));
            // dd(!$existUserPurchased -> isEmpty() && strtolower($status) === "completed");
        if(!$existUserPurchased -> isEmpty() && strtolower($status) === "completed") {
           
            $userReview = new UserReview();
            $userReview->setUserID($userId);
            $userReview->setOrderedProductID($currentProductIdOnWeb);
            $userReview->setRating($request->input('rating'));
            $userReview->setComment($request->input('comment'));

            $userReview->save();

            return response()->json([
                'message' => 'Review Successfully',
                'currentUserId' => $userId,
                'currentUserName' => $currentUserName,
                'data' => $existUserPurchased,
                'currentProductOnWeb' => $currentProductIdOnWeb,
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
