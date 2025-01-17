<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InfoShop;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [
            'lastedProducts' => [],
        ];
        $lastedProducts = Product::latest()->take(8)->get();
        // return json_encode($lastedProducts);
        $viewData['lastedProducts'] = $lastedProducts;
        return view("Template.pages.index")->with('viewData', $viewData);
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
    
    public function blogsingle()
    {
        return view("Template.pages.blog_single");
    }
 
}
