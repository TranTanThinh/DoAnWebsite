<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Promotion;

class CartController extends Controller
{
    public function index(Request $request)
{
    $total = 0;
    $productsInSession = $request->session()->get('products', []);  // Sử dụng mảng rỗng mặc định nếu không có key 'products'

    if ($productsInSession) {
        $productsInCart = Product::findMany(array_keys($productsInSession));  // Lấy thông tin sản phẩm
        $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);  // Tính tổng giá trị giỏ hàng
    }

    $viewData = [
        'total' => $total,
        'products' => $productsInCart ?? [],  // Đảm bảo 'products' có giá trị mặc định nếu không có sản phẩm
        'cartCount' => count($productsInSession),  // Đếm số lượng sản phẩm trong giỏ
    ];
    $request->session()->put('cartViewData', $viewData);

    return view('Template.pages.cart.index');
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
        // Lấy sản phẩm từ session (nếu có)
        $products = $request->session()->get('products', []);

        // Kiểm tra nếu sản phẩm đã có trong giỏ hàng
        if (isset($products[$id])) {
            $products[$id] += $request->input('quantity'); // Cộng dồn số lượng nếu sản phẩm đã có
        } else {
            $products[$id] = $request->input('quantity'); // Nếu chưa có thì thêm mới
        }

        // Lưu lại vào session
        $request->session()->put('products', $products);

        return redirect()->route('cart.index');
    }


    public function delete(Request $request, $id)
    {
        $products = $request->session()->get('products', []);


        if (array_key_exists($id, $products)) {
            unset($products[$id]);
            $request->session()->put('products', $products);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
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
    //Dem so luong san pham trong gio hang
    public function someControllerMethod()
    {
        $cartCount = Session::has('cart') ? count(Session::get('cart')) : 0;
        return view('your-view', compact('cartCount'));
    }


    public function getCartCount(Request $request)
    {
        $productsInSession = $request->session()->get('products', []);
        $cartCount = count($productsInSession); // Đếm số sản phẩm trong giỏ hàng

        return response()->json(['count' => $cartCount]);
    }

    public function applyPromotion(Request $request)
    {
        $promotionCode = $request->input('promotion_code');
        $total = $request->session()->get('total', 0);

        // Tìm mã khuyến mãi
        $promotion = Promotion::where('name', $promotionCode)->first();

        if ($promotion) {
            if ($promotion->isActive && now()->between($promotion->startDate, $promotion->endDate)) {
                // Tính giảm giá
                $discountAmount = ($promotion->discountRate / 100) * $total;
                $totalAfterDiscount = $total - $discountAmount;

                // Trả về JSON
                return response()->json([
                    'success' => true,
                    'discountAmount' => number_format($discountAmount, 2),
                    'totalAfterDiscount' => number_format($totalAfterDiscount, 2),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'This promotion is not active or has expired.',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid promotion code.',
            ]);
        }
    }
}
