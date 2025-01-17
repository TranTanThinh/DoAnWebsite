<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $total = 0;
        $productsInSession = $request->session()->get('products', []);

        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        // Định nghĩa $viewData
        $viewData = [
            'total' => $total,
            'products' => $productsInCart ?? [],
            'cartCount' => count($productsInSession),
        ];

        // Truyền dữ liệu vào view
        return view('Template.pages.checkout', compact('viewData'));
    }
}
