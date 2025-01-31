@extends('Template.layouts.app')
@section('title', 'Cart')
@section('main')

    @include('Template.components.banner')

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity (kg)</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewData['products'] as $product)
                                    <tr class="text-center">
                                        <td class="product-remove"><a href="{{route ('cart.delete', ['id' => $product->getProductId()])}}"><span class="ion-ios-close"></span></a>
                                        </td>

                                        <td class="image-prod">
                                            <div class="img"
                                                style="background-image:url('{{ asset('Template/images/' . $product->getImage()) }}');">
                                            </div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{ $product->getName() }}</h3>
                                        </td>

                                        <td class="price">{{ number_format($product->getPrice()) }}&#8363</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" name="quantity"
                                                    class="quantity form-control input-number"
                                                    value="{{ session('products')[$product->getProductId()] }}"
                                                    min="1" max="100">
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                <form method="POST" action="{{ route('cart.deleteAll') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete All</button>
                                </form>                             
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="total">{{ number_format($viewData['total']) }}&#8363</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">State/Province</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Zip/Postal Code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout" class="btn btn-primary py-3 px-4">Estimate</a></p>
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        @include('Template.components.carttotal')
                    </div>
                    <p><a href="checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>

    @include('Template.components.subcribe')

@endsection
