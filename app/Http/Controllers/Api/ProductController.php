<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function getRelatedProducts($id) {

        $product = Product::where('productId', '=', $id)->firstOrFail();
        $relatedProducts = Product::where('categoryId', $product->getCategoryId())
                            ->where('productId', '!=', $product->getProductId())
                            ->limit(4)
                            ->inRandomOrder()
                            ->get();
        
        return response()->json($relatedProducts);

        // return response()->json([
        //     'message' => 'success',
        //     'id'=>$id,
        //     'statusCode' => 200
        // ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return response()->json($products);
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
    public function show(string $id)
    {
        $viewData = [];
        
        $product = Product::where('productId','=' , $id)
                            ->firstOrFail();
        
        $status = $product->inventories->sum('quantity');
        
        $viewData['product'] = $product;
        // $viewData['status'] = $status > 0 ? 'In stock' : 'Out of Stock';
        // $viewData['quantity'] = $product->inventories;
        $viewData['qty'] = $product->inventories->sum('quantity');

        return response()->json($viewData);
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
