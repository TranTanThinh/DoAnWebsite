<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;


class ProductController123 extends Controller
{
    /**
     * Display a listing of the resource.


     */

    public function index()
    {
        // return view("Dashboard.pages.addproduct");
        $products = Product::all(); // Lấy tất cả dữ liệu từ bảng products
        return view('Dashboard.pages.product.listproduct', compact('products'));
    }

    
    public function search(Request $request)
    {
        $query = $request->input('query'); // Từ khóa tìm kiếm cho ID, Name và Price
    
        $products = Product::query(); // Khởi tạo truy vấn
    
        if (!empty($query)) {
            // Tìm kiếm theo ID, Name hoặc Price
            $products->where(function($q) use ($query) {
                $q->where('productId', 'LIKE', "%{$query}%")
                  ->orWhere('name', 'LIKE', "%{$query}%")
                  ->orWhere('price', 'LIKE', "%{$query}%"); // Tìm kiếm theo Price
            });
        }
    
        $products = $products->get(); // Thực hiện truy vấn
    
        return view('Dashboard.pages.product.searchproduct', compact('products', 'query')); // Trả về kết quả tìm kiếm
    }
    
    // public function index()
    // {

    //     $viewData = [];
    //     $products = Product::all();
    //     $viewData['title'] = 'Shop Products';
    //     $viewData['products'] = $products;


    //     return view('Template.product.index')->with('viewData', $viewData);
    // }



 



    // public function index()
    // {

    //     $viewData = [];
    //     // $products = Product::all();
    //     $products = Product::paginate(12);
    //     // dd($products);
    //     $viewData['title'] = 'Shop Products';
    //     $viewData['products'] = $products;


    //     return view('Template.product.index')->with('viewData', $viewData);
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.pages.product.addproduct');
        //
    }

    public function store(Request $request)
{
    // Validate incoming request data, excluding 'categoryId'
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:10000|max:500000', // Điều kiện mới cho price
        'description' => 'required|string',
        'image' => 'required|image',
        'slug' => 'required|string|max:255',
    ]);

    // Check if the product name already exists in the database
    $existingProduct = Product::where('name', $validatedData['name'])->first();

    if ($existingProduct) {
        return redirect()
            ->back()
            ->withErrors(['name' => 'The product name already exists.'])
            ->withInput();
    }

    // Upload image
    $imagePath = $request->file('image')->store('products', 'public');

    // Create the new product with categoryId set to 1 by default
    Product::create([
        'categoryId' => 1, // Set categoryId to 1 by default
        'name' => $validatedData['name'],
        'price' => $validatedData['price'],
        'description' => $validatedData['description'],
        'image' => $imagePath,
        'slug' => $validatedData['slug'],
    ]);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

    

        public function edit($id)
    {
        // Tìm sản phẩm theo productId thay vì id
        $product = Product::where('productId', $id)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

    }

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

   
        public function update(Request $request, $id)
    {

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'slug' => 'required',
            'image' => 'nullable|image',
        ]);

        // Tìm sản phẩm
        $product = Product::where('productId', $id)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        // Cập nhật thông tin sản phẩm
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->slug = $request->slug;

        // Xử lý hình ảnh (nếu có)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save(); // Lưu thay đổi

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy($id)
{
    // Tìm sản phẩm theo productId thay vì id
    $product = Product::where('productId', $id)->first();

    if (!$product) {
        return redirect()->route('products.index')->with('error', 'Product not found.');
    }

    // Xóa sản phẩm
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}



}
