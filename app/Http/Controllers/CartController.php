<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->get(); // Tạm thời bỏ điều kiện để kiểm tra
        return view('Template.pages.cart', compact('carts'));
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId); // Sử dụng productId thay vì id

        $cart = Cart::where('product_id', $productId)->where('user_id', auth()->id())->first();

        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->product_id = $product->productId; // Sử dụng productId thay vì id
            $cart->user_id = auth()->id(); // Đảm bảo người dùng đã đăng nhập
            $cart->quantity = 1;
        }

        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart');
    }
}
