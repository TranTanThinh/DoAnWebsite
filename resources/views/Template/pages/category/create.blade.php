@extends('Template.layouts.app')
@section('title', 'Add New Category')
@section('main')

@include('Template.components.banner')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4 text-center">Add New Category</h2>
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Category Name:</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="slug" class="form-label">Slug:</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="parent_id" class="form-label">Parent Category:</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">None</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->categoryId }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter category description"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
