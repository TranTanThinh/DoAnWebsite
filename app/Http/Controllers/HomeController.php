<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("Template.pages.index");
    }
    public function blog()
    {
        return view("Template.pages.blog");
    }
    public function about()
    {
        return view("Template.pages.about");
    }
    public function cart()
    {
        return view("Template.pages.cart");
    }
    public function contact()
    {
        return view("Template.pages.contact");
    }
    public function checkout()
    {
        return view("Template.pages.checkout");
    }
    public function shop()
    {
        return view("Template.pages.shop");
    }
    public function shopsingle()
    {
        return view("Template.pages.shopsingle");
    }
    public function productsingle()
    {
        return view("Template.pages.productsingle");
    }
    public function wishlist()
    {
        return view("Template.pages.wishlist");
    }
}
