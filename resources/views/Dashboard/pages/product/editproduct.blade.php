@extends('Dashboard.layouts.app')

@section('main')
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product->productId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Phương thức PUT cho cập nhật -->

        <div class="mb-3">
            <label for="categoryId" class="form-label">Category ID</label>
            <input type="number" class="form-control" id="categoryId" name="categoryId" value="{{ $product->categoryId }}" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 100px; margin-top: 10px;">
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
