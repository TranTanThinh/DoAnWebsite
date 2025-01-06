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
        $products = Product::all();
        $viewData['title'] = 'Shop Products';
        $viewData['products'] = $products;

        return view('Template.product.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, string $id)
    {
        $viewData = [];
        // $product = Product::findOrFail($id);
        $product = Product::where('slug', 'like',$slug)
                            ->where('productId','=' , $id)
                            ->firstOrFail();
        // $product = DB::table('products')
        //         ->join('inventories', 'products.productID', '=', 'inventories.productID')
        //         ->select('products.*', 'inventories.quantity')
        //         ->where('products.productID', '=', $id)
        //         ->get();

        // $quantity = Inventory::where('productID','=', $id)
        //             ->get();
        $viewData['product'] = $product;
        // $viewData['quantity'] = $quantity;
        $viewData['quantity'] = $product->inventories;
        // return $viewData;
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
