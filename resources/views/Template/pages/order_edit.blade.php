@extends('Template.layouts.app')

@section('title', 'Edit Order')

@section('main')
@include('Template.components.banner')

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Edit Order - #{{ $order->id }}</h2>
                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" name="status" class="form-control" value="{{ old('status', $order->status) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="totalPrice">Total Price</label>
                        <input type="text" id="totalPrice" name="totalPrice" class="form-control" value="{{ old('totalPrice', $order->totalPrice) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update Order</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
