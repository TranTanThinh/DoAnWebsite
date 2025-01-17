<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminCategoryController extends Controller
{
    // Hiển thị tất cả danh mục
    public function index()
    {
        // Lấy tất cả các danh mục từ bảng categories
        $categories = Category::all();

        // Trả về view kèm theo dữ liệu
        return view('Dashboard.pages.category.listcategory', compact('categories'));
    }

        public function create()
    {
        // Lấy danh sách tất cả các loại sản phẩm
        $categories = Category::all();

        return view('Dashboard.pages.product.add', compact('categories'));
    }
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:10000|max:500000',
        'description' => 'required|string',
        'image' => 'required|image',
        'slug' => 'required|string|max:255',
        'categoryId' => 'required|exists:categories,categoryId', // Kiểm tra categoryId có tồn tại trong bảng categories
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

    // Create the new product with selected categoryId
    Product::create([
        'categoryId' => $validatedData['categoryId'], // Get categoryId from the form
        'name' => $validatedData['name'],
        'price' => $validatedData['price'],
        'description' => $validatedData['description'],
        'image' => $imagePath,
        'slug' => $validatedData['slug'],
    ]);

    return redirect()->route('products.index')->with('success', 'Product added successfully!');
}

    

    
}
