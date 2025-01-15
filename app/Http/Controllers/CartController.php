<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('Template.pages.cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id) {
        $products = request()->session()->get('products');
        $products[$id] = '';
        $value =  $request->input('quantity');
        if(str_contains($value, ',')) {
            $products[$id] = str_replace(',', '.', $value);
        } else {
            $products[$id] = $request->input('quantity');
        }
        // dd($products[$id], gettype($products[$id]));
        request()->session()->put('products', $products);

        return redirect()->route('cart.index');
    }

    public function deleteAll(Request $request) {
        request()->session()->forget('products');

        return back();
    }
    
}
