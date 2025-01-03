<?php

namespace App\Http\Controllers;
use App\Models\InfoShop;

abstract class InfoShopController
{
    public function index()
    {
        $shops = InfoShop::all();

        return view('footer');
    }
}
