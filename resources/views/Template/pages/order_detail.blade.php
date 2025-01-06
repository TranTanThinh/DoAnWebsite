@extends('Template.layouts.app')

@section('title', 'Order Detail')

@section('main')
@include('Template.components.banner')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center">Order Detail - #{{ $order->id }}</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Shipping Address</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->uid }}</td>
                                <td>{{ $order->shippingAddressId }}</td>
                                <td>{{ $order->status }}</td>
                                <td>${{ $order->totalPrice }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Order Items</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->productId }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ $item->price }}</td>
                                    <td>${{ $item->quantity * $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('orders.index') }}" class="btn btn-primary">Back to Orders List</a>
            </div>
        </div>
    </div>
</section>

@endsection
