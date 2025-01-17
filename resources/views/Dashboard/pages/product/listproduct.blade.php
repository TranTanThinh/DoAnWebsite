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

            <div class="card-body">
                <div class="table-responsive">
                    <h4 class="card-title">Danh sách sản phẩm</h4>
                    <table id="basic-datatables" class="display table table-striped table-hover">
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
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->productId }}</td>
                                <td>{{ $product->categoryId ? $product->category->name : 'No Category' }}</td>
                                <td>
                                    <a href="#" class="product-name" data-id="{{ $product->productId }}" 
                                       data-name="{{ $product->name }}" 
                                       data-image="{{ asset($product->image) }}" 
                                       data-description="{{ $product->description }}" 
                                       data-price="{{ number_format($product->price, 2) }} VND" 
                                       data-slug="{{ $product->slug }}" 
                                       data-created="{{ $product->created_at }}" 
                                       data-updated="{{ $product->updated_at }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 100px; height: auto;"></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ number_format($product->price, 2) }} VND</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    <!-- Nút chỉnh sửa -->
                                    <div class="d-flex justify-content-start">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for showing product details -->
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex">
                    <!-- Left side: Image -->
                    <div style="flex: 1; padding-right: 20px;">
                        <img id="modalProductImage" src="" class="img-fluid" alt="Product Image" />
                    </div>

                    <!-- Right side: Product info -->
                    <div style="flex: 1;">
                        <div class="mb-3">
                            <strong>Name:</strong>
                            <p id="modalProductName"></p>
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong>
                            <p id="modalProductDescription"></p>
                        </div>
                        <div class="mb-3">
                            <strong>Price:</strong>
                            <p id="modalProductPrice"></p>
                        </div>
                        <div class="mb-3">
                            <strong>Slug:</strong>
                            <p id="modalProductSlug"></p>
                        </div>
                        <div class="mb-3">
                            <strong>Created At:</strong>
                            <p id="modalProductCreated"></p>
                        </div>
                        <div class="mb-3">
                            <strong>Updated At:</strong>
                            <p id="modalProductUpdated"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.product-name').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();

                // Lấy dữ liệu từ data attributes
                const productName = this.getAttribute('data-name');
                const productDescription = this.getAttribute('data-description');
                const productPrice = this.getAttribute('data-price');
                const productSlug = this.getAttribute('data-slug');
                const productCreated = this.getAttribute('data-created');
                const productUpdated = this.getAttribute('data-updated');
                const productImage = this.getAttribute('data-image');

                // Gán dữ liệu vào modal
                document.getElementById('modalProductName').textContent = productName;
                document.getElementById('modalProductDescription').textContent = productDescription;
                document.getElementById('modalProductPrice').textContent = productPrice;
                document.getElementById('modalProductSlug').textContent = productSlug;
                document.getElementById('modalProductCreated').textContent = productCreated;
                document.getElementById('modalProductUpdated').textContent = productUpdated;
                document.getElementById('modalProductImage').setAttribute('src', productImage);

                // Mở modal
                new bootstrap.Modal(document.getElementById('productDetailModal')).show();
            });
        });
    </script>

@endsection
