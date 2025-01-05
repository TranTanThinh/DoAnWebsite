@extends('Dashboard.layouts.app')
@section('main')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center" style="margin-top: 120px;">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
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

            <script>
                document.getElementById('addProductButton').addEventListener('click', function() {
                    new bootstrap.Modal(document.getElementById('addProductModal')).show();
                });
            </script>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <h4 class="card-title">Danh sách sản phẩm</h4>
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
                        <body>
                           
                            <table>
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
                                    <!-- Nút chỉnh sửa -->
                                    <td>
                                        <!-- Group both icons together in a div or span -->
                                        <div class="d-flex justify-content-start">
                                            <!-- Nút chỉnh sửa -->
                                            <a href="{{ route('products.edit', $product->productId) }}" class="btn btn-primary btn-sm me-2">
                                                <i class="fa fa-edit"></i> <!-- Biểu tượng chỉnh sửa -->
                                            </a>
                                    
                                            <!-- Nút xóa -->
                                            <form action="{{ route('products.destroy', $product->productId) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> <!-- Biểu tượng xóa -->
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </body>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@endsection
