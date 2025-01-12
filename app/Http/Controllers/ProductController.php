<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
    */



    public function index()
    {

        $viewData = [];
        // $products = Product::all();
        $products = Product::paginate(12);
        // dd($products);
        $viewData['title'] = 'Shop Products';
        $viewData['products'] = $products;


        return view('Template.product.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $slug, string $id)
    {
        $viewData = [];
        
        $product = Product::where('slug', 'like',$slug)
                            ->where('productId','=' , $id)
                            ->firstOrFail();
        // $product = Product::where('productId', '=', $id)->firstOrFail();
        // $relatedProducts = Product::where('categoryId', $product->getCategoryId())
        //                     ->where('productId', '!=', $product->getProductId())
        //                     ->limit(4)
        //                     ->get();
        // dd($relatedProducts);
        $status = $product->inventories->sum('quantity');
        
        $viewData['product'] = $product;
        $viewData['status'] = $status > 0 ? 'In stock' : 'Out of Stock';
        $viewData['quantity'] = $product->inventories;


        // dd($viewData);
        return view('Template.product.show')->with('viewData', $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        //
    }
}
