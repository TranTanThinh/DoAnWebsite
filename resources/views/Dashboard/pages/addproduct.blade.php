@extends('Dashboard.layouts.app')
@section('main')



    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
                        <head>
                            <title>Danh sách sản phẩm</title>
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
                            <h1>Danh sách sản phẩm</h1>
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

@endsection
