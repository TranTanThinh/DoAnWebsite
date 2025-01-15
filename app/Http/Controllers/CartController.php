<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add to the cart');
        }
        $carts = Cart::with('product')->where('user_id', Auth::id())->paginate(5); // Phân trang với 5 sản phẩm mỗi trang
        return view('Template.pages.cart', compact('carts'));
    }

    public function addToCart($productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add to the cart');
        }

        $product = Product::findOrFail($productId);
        $userId = Auth::id();
        $cart = Cart::where('product_id', $productId)->where('user_id', $userId)->first();

        if ($cart) {
            $cart->quantity += 1;
        } else {
            $cart = new Cart();
            $cart->product_id = $productId;
            $cart->user_id = $userId;
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
    public function destroyAll()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index')->with('success', 'All products removed from cart');
    }

    // AJAX: Update quantity in cart
    public function updateCart(Request $request)
    {
        $validated = $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($validated['cart_id']);
        $cart->quantity = $validated['quantity'];
        $cart->save();

        $totalPrice = $cart->product->price * $cart->quantity;

        return response()->json([
            'success' => true,
            'totalPrice' => $totalPrice,
            'message' => 'Cart updated successfully!',
        ]);
    }
}
