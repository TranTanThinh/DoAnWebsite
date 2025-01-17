
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
