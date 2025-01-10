<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index() {
        $user = auth()->user();
        $wishlists = Wishlist::all();
        $viewData = [];
        $viewData['title'] = 'Wishlist';
        // return $wishlists;
        // return $user;
        
        if($wishlists->count() > 0) {
            // return json_encode($wishlists);
            $data = DB::connection('mysql')->table('wishlists')
                            ->join('users', 'wishlists.userID', '=', 'users.id')
                            ->join('products', 'products.productId', '=', 'wishlists.productID')
                            ->select( 'products.*')
                            ->where('wishlists.userID', '=', $user->id, 'and', 'wishlists.productID','=' ,$wishlists[0]->productID)
                            // ->where('wishlists.productID','=' ,$wishlists[0]->productID)
                            ->paginate(5);
                            // ->get();

            $viewData['data'] = $data;
            // return json_encode([
            //     'success' => $data,
            //     'statusCode' => 200
            // ]);
        } else {
            $viewData['message'] = 'No Records';
        }
        // dd($data);
        return view('Template.pages.wishlist.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id) {
        $data = [];
        $user = auth()->user();

        $existingInWishlist = Wishlist::where('userID', '=', $user->id)
                                ->where('productID', '=', $id)
                                ->first(); 

        // return $existingInWishlist;
        if(!$existingInWishlist) {
            Wishlist::create([
                'userID' => $user->id,
                'productID' => $id,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')
            ]);
        }
        // $data['user_id'] = $user;
        // $data['request'] = $request->all();
        return redirect()->back();
    }

    public function removeProductFromWishlist($product_id) {
        $user =  auth()->user();

        if($user) {
            Wishlist::where('userID', '=', $user->id)
                    ->where('productID', '=', $product_id)
                    ->delete();
        }

        return redirect()->back();
    }
}
