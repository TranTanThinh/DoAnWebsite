<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $viewData = $request->session()->get('cartViewData', [
            'total' => 0,
            'products' => [],
            'cartCount' => 0,
        ]);

        return view('Template.pages.checkout', compact('viewData'));
    }
}
