@extends('Dashboard.layouts.app')
@section('main')

<div class="col-md-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center" style="margin-top: 120px;">
            <h4 class="card-title">Danh sách sản phẩm</h4>
            <form action="{{ route('products.search') }}" method="GET" class="d-flex">
                <input
                    type="text"
                    name="query"
                    class="form-control me-2"
                    placeholder="Tìm kiếm theo ID, Name hoặc Price..."
                    value="{{ request('query') }}"
                />
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>
        
        
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-striped table-hover">
                    <head>
                        <style>
                            table {
                                width: 100%;
                                border-collapse: collapse;
                            }
                            table, th, td {
                                border: 1px solid black;
                            }
                            th, td {
                                padding: 10px;
                                text-align: left;
                            }
                            img {
                                max-width: 100px;
                                height: auto;
                            }
                        </style>
                    </head>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Slug</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($products->isEmpty())
                            <tr>
                                <td colspan="9">Không tìm thấy kết quả cho từ khóa "{{ $query }}"</td>
                            </tr>
                        @else
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->productId }}</td>
                                    <td>{{ $product->categoryId }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ number_format($product->price, 2) }} VND</td>
                                    <td>{{ $product->slug }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
