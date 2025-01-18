@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Failed!</h1>
        <p>{{ $message ?? 'There was an error processing your payment. Please try again.' }}</p>
        <p>Order ID: {{ $data['vnp_TxnRef'] ?? '' }}</p>
        <p>Response Code: {{ $data['vnp_ResponseCode'] ?? '' }}</p>
    </div>
@endsection
