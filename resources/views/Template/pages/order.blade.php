@extends('Template.layouts.app')
@section('title', 'Order Management')
@section('main')

@include('Template.components.banner')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User ID</th>
                                <th>Shipping Address</th>
                                <th>Status</th>
                                <th>Total Price</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->uid }}</td>
                                <td>{{ $order->shippingAddressId }}</td>
                                <td>{{ $order->status }}</td>
                                <td>${{ $order->totalPrice }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->getId()) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('orders.edit', $order->getId()) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('orders.destroy', $order->getId()) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</section>

@endsection
