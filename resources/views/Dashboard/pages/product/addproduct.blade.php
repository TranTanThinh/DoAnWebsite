@extends('Dashboard.layouts.app')
@section('main')
<div class="container content-wrapper">
    <h2>Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Input for Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Hidden Input for Slug -->
        <input type="hidden" id="slug" name="slug" value="{{ old('slug') }}">

        <!-- Input for Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <!-- Input for Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <!-- Input for Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        <!-- Input for Category -->
        <div class="mb-3">
            <label for="categoryId" class="form-label">Category</label>
            <select class="form-control @error('categoryId') is-invalid @enderror" id="categoryId" name="categoryId" required>
                <option value="" disabled selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->categoryId }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categoryId')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Submit and Cancel buttons -->
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.search') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- JavaScript -->
<script>
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase()
                         .trim()
                         .normalize('NFD') // Normalize accented characters
                         .replace(/[\u0300-\u036f]/g, '') // Remove diacritics
                         .replace(/[^a-z0-9\s-]/g, '') // Remove invalid characters
                         .replace(/\s+/g, '-') // Replace spaces with hyphens
                         .replace(/-+/g, '-'); // Remove consecutive hyphens
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
