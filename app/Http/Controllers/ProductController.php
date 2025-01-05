<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.pages.product.addproduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate incoming request data, excluding 'categoryId'
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
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

    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($id)
    {
        // Tìm sản phẩm theo productId thay vì id
        $product = Product::where('productId', $id)->first();

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        return view('Dashboard.pages.product.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
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
