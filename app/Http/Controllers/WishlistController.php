<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index() {
        return view('Template.pages.wishlist.index');
    }

    public function add(Request $request, $id) {
        return $request;
    }
}
