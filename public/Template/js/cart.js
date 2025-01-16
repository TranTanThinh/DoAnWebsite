function updateCartCount() {
    fetch('/cart/count') // Gọi API lấy số lượng giỏ hàng
        .then(response => response.json())
        .then(data => {
            document.getElementById('cart-count').textContent = data.count; // Cập nhật số lượng giỏ hàng
        })
        .catch(error => console.error('Error fetching cart count:', error));
}

// Gọi updateCartCount khi trang được tải
document.addEventListener('DOMContentLoaded', updateCartCount);
