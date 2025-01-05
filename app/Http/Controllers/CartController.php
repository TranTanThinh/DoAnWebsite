<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->get(); // Tạm thời bỏ điều kiện để kiểm tra
        return view('Template.pages.cart', compact('carts'));
    }
}


