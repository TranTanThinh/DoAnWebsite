<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.


     */

    // public function index()
    // {
    //     // return view("Dashboard.pages.addproduct");
    //     $products = Product::all(); // Lấy tất cả dữ liệu từ bảng products
    //     return view('Dashboard.pages.product.listproduct', compact('products'));
    // }

    public function index()
    {
        // Lấy tất cả sản phẩm kèm theo thông tin loại sản phẩm (category)
        $products = Product::with('category')->get();
    
        return view('Dashboard.pages.product.index', compact('products'));
    }

    
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input
        $query = $request->input('query');
    
        // Kiểm tra nếu từ khóa tìm kiếm không trống
        if (!empty($query)) {
            // Thực hiện truy vấn tìm kiếm theo ID, Name hoặc Price
            $products = Product::where('productId', $query) // Tìm kiếm chính xác theo productId
                ->orWhere('name', 'LIKE', "%{$query}%")    // Tìm kiếm gần đúng theo name
                ->orWhere('price', $query)                // Tìm kiếm chính xác theo price
                ->get();
        } else {
            // Nếu không có từ khóa, trả về danh sách tất cả sản phẩm
            $products = Product::all();
        }
    
        // Trả về view với kết quả tìm kiếm
        return view('Dashboard.pages.product.searchproduct', compact('products', 'query'));
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
    // public function create()
    // {
    //     return view('Dashboard.pages.product.addproduct');
    //     //
    // }

    public function create()
{
    // Lấy danh sách tất cả các loại sản phẩm
    $categories = Category::all();

    return view('Dashboard.pages.product.addproduct', compact('categories'));
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

    return redirect()->route('products.search')->with('success', 'Product added successfully!');
}

    

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Dashboard.pages.product.editproduct', compact('product'));
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
        return redirect()->route('products.search')->with('error', 'Product not found.');
    }

    // Xóa sản phẩm
    $product->delete();

    return redirect()->route('products.search')->with('success', 'Product deleted successfully.');
}

    


}
