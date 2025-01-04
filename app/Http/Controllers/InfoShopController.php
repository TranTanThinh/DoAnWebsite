<?php

namespace App\Http\Controllers;

use App\Models\InfoShop;

abstract class InfoShopController
{
    public function index()
    {
        // $shops = [];
        $shops = InfoShop::all();
        // dd(InfoShop::all());
        // dd($shops);
        return view('Template.layouts.app', ['shops' => $shops]);
    }
}
