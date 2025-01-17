<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    <div class="cart-total mb-3">
        <h3>Cart Totals</h3>
        <p class="d-flex">
            <span>Subtotal</span>
            <span>{{ number_format($viewData['total'] ?? 0, 0) }}&#8363;</span>
        </p>
        <p class="d-flex">
            <span>Delivery</span>
            <span>$0.00</span>
        </p>
        <p class="d-flex">
            <span>Discount</span>
            <span id="discount-amount">{{ number_format($viewData['discountAmount'] ?? 0, 0) }}</span>
        </p>
        <hr>
        <p class="d-flex total-price">
            <span>Total</span>
            <span id="total-price">{{ number_format($viewData['total'], 0) }}</span>
        </p>
    </div>
    <p><form action="{{url('/vnpay_payment')}}" method="post">
        @csrf
        <input name="total" type="hidden" value="{{ $viewData['total'] }}">
        <button type="submit" class="btn btn-primary py-3 px-4">Pay</button>
        {{-- <a href="{{route('checkout')}}" class="btn btn-primary py-3 px-4">Pay</a> --}}
    </form>
    </p>
    
</div>