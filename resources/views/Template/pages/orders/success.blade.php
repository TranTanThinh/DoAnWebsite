@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order Successful!</h1>
        <p>Thank you for your payment. Your order has been successfully processed.</p>
        <p>Order ID: {{ $data['vnp_TxnRef'] }}</p>
        <p>Amount: {{ number_format($data['vnp_Amount'] / 100, 0) }} VND</p>
    </div>
@endsection
