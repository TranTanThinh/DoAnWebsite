<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('Template.pages.category.index', compact('category'));
    }

    public function create()
    {
        $category = Category::all();
        return view('Template.pages.category.create', compact('category'));
    }

    public function store(Request $request)
    {

        $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug',
        'parent_id' => 'nullable|exists:categories,categoryId',
        'description' => 'nullable|string',
        ]);

        Category::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'parent_id' => $request->parent_id,
        'description' => $request->description,
        ]);
        return redirect()->route('category.index')->with('success', 'Category added successfully.');
    }
    public function show(string $id)
    {
        //
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->get();
        return view('Template.pages.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $id . ',categoryId',
        'parent_id' => 'nullable|integer|exists:categories,categoryId',
    ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

    if ($category->childCategories()->exists()) {
        return redirect()->route('category.index')->with('error', 'Cannot delete category with child categories.');
    }
    $category->delete();

    return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
