<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth; // Thêm khai báo này

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('Template.pages.cart.index')->with('viewData', $viewData);
    }

    public function cartIndex()
    {
        $carts = Cart::with('product')->get(); // Tạm thời bỏ điều kiện để kiểm tra
        return view('Template.pages.cart', compact('carts'));
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId); // Sử dụng productId thay vì id

        $userId = Auth::id(); // Lấy ID người dùng hiện tại

        $cart = Cart::where('product_id', $productId)->where('user_id', $userId)->first();

        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->product_id = $productId; // Sử dụng productId thay vì id
            $cart->user_id = $userId; // Đảm bảo người dùng đã đăng nhập
            $cart->quantity = 1;
        }

        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }

    public function add(Request $request, $id)
    {
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }
}
