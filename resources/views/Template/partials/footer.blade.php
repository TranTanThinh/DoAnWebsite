<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row">
            <div class="mouse">
                <a href="#" class="mouse-icon">
                    <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                </a>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">{{ $shops->shopName }}</h2>
                    <p>{{ $shops->describe }}</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{ $shops->twitter }}"><span class="icon-twitter"></span></a>
                        </li>
                        <li class="ftco-animate"><a href="{{ $shops->facebook }}"><span
                                    class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{ $shops->instagram }}"><span
                                    class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="shop" class="py-2 d-block">Shop</a></li>
                        <li><a href="about" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Journal</a></li>
                        <li><a href="contact" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">LOGISTICS</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><img src="https://down-vn.img.susercontent.com/file/vn-50009109-159200e3e365de418aae52b840f24185"
                                    alt=""></li>
                            <li><img src="https://down-vn.img.susercontent.com/file/vn-50009109-64f0b242486a67a3d29fd4bcf024a8c6"
                                    alt=""></li>
                            <li><img src="https://down-vn.img.susercontent.com/file/59270fb2f3fbb7cbc92fca3877edde3f"
                                    alt=""></li>
                            <li><img src="https://down-vn.img.susercontent.com/file/957f4eec32b963115f952835c779cd2c"
                                    alt=""></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><img src="https://down-vn.img.susercontent.com/file/0d349e22ca8d4337d11c9b134cf9fe63"
                                    alt=""></li>
                            <li><img src="https://down-vn.img.susercontent.com/file/3900aefbf52b1c180ba66e5ec91190e5"
                                    alt=""></li>
                            <li><img src="https://down-vn.img.susercontent.com/file/vn-50009109-ec3ae587db6309b791b78eb8af6793fd"
                                    alt=""></li>
                            <li><img src="https://down-vn.img.susercontent.com/file/0b3014da32de48c03340a4e4154328f6"
                                    alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span
                                    class="text">{{ $shops->address }}</span></li>
                            <li><a href="tel:{{ $shops->phone }}"><span class="icon icon-phone"></span><span
                                        class="text">{{ $shops->phone }}</span></a></li>
                            <li><a href="mailto:{{ $shops->email }}"><span class="icon icon-envelope"></span><span
                                        class="text">{{ $shops->email }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved.
                </p>
            </div>

        </div>
    </div>
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6783b39baf5bfec1dbea7568/1ihd7b6bu';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>

<!-- Loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee">
        </circle>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00"></circle>
    </svg>
</div>

<!-- Scripts -->
<script src="{{ asset('Template/js/jquery.min.js') }}"></script>
<script src="{{ asset('Template/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('Template/js/popper.min.js') }}"></script>
<script src="{{ asset('Template/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Template/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('Template/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('Template/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('Template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Template/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('Template/js/aos.js') }}"></script>
<script src="{{ asset('Template/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('Template/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('Template/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('Template/js/google-map.js') }}"></script>
<script src="{{ asset('Template/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('Template/js/cart.js') }}"></script>
<script>
    // Đăng nhập
    document.getElementById('togglePasswordLogin').addEventListener('click', function() {
        const passwordField = document.querySelector('#loginModal #password');
        const passwordFieldType = passwordField.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    // Đăng ký
    document.getElementById('togglePasswordRegister').addEventListener('click', function() {
        const passwordField = document.querySelector('#registerModal #password');
        const passwordFieldType = passwordField.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });

    document.getElementById('togglePasswordConfirmRegister').addEventListener('click', function() {
        const passwordField = document.querySelector('#registerModal #password_confirmation');
        const passwordFieldType = passwordField.getAttribute('type');

        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            this.classList.remove('fa-eye');
            this.classList.add('fa-eye-slash');
        } else {
            passwordField.setAttribute('type', 'password');
            this.classList.remove('fa-eye-slash');
            this.classList.add('fa-eye');
        }
    });
</script>
<script>
    $(document).ready(function() {
                // Đăng nhập AJAX
                $('#loginForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = {
                        username: $('#username').val(),
                        password: $('#password').val(),
                        _token: $('input[name="_token"]').val(),
                    };

                    $.ajax({
                        url: '{{ route('login') }}', // Đảm bảo route đúng
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            console.log(response); // In ra để kiểm tra phản hồi từ server
                            if (response.status === 'success') {
                                $('#notificationBar').removeClass('alert-danger').addClass(
                                    'alert-success');
                                $('#notificationMessage').text(response.message);
                                $('#notificationBar').fadeIn().delay(3000)
                                    .fadeOut(); // Hiển thị thông báo và tự động ẩn sau 3 giây
                                setTimeout(function() {
                                    window.location.href = response
                                        .redirect; // Chuyển hướng sau khi đăng nhập thành công
                                }, 1500);
                            } else {
                                $('#notificationBar').removeClass('alert-success').addClass(
                                    'alert-danger');
                                $('#notificationMessage').text(response.message);
                                $('#notificationBar').fadeIn().delay(3000).fadeOut();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText); // Kiểm tra lỗi chi tiết
                            $('#notificationBar').removeClass('alert-success').addClass(
                                'alert-danger');
                            $('#notificationMessage').text('An error occurred. Please try again.');
                            $('#notificationBar').fadeIn().delay(3000).fadeOut();
                        }
                    });
                });

                // Đăng ký AJAX
                $('#registerForm').on('submit', function(e) {
                        e.preventDefault();

                        var formData = {
                            username: $('#register_username').val(),
                            email: $('#register_email').val(),
                            phone: $('#register_phone').val(),
                            password: $('#register_password').val(),
                            password_confirmation: $('#register_password_confirmation').val(),
                            _token: $('input[name="_token"]').val(),
                        };

                        $.ajax({
                                url: '{{ url('register') }}',
                                type: 'POST',
                                data: formData,
                                success: function(response) {
                                    console.log(response); // In ra để kiểm tra phản hồi từ server
                                    if (response.status === 'success') {
                                        $('#notificationBar').removeClass('alert-danger').addClass(
                                            'alert-success');
                                        $('#notificationMessage').text(response.message);
                                        $('#notificationBar').fadeIn().delay(3000).fadeOut();
                                        setTimeout(function() {
                                            window.location.href = response
                                                .redirect; // Chuyển hướng sau khi đăng ký thành công
                                        }, 1500);
                                    } else {
                                        $('#notificationBar').removeClass('alert-success').addClass(
                                            'alert-danger');
                                        $('#notificationMessage').text(response.message);
                                        $('#notificationBar').fadeIn().delay(3000).fadeOut();
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText); // Kiểm tra lỗi chi tiết
                                    if (xhr.status === 422) {
                                        // Nếu có lỗi từ server (ví dụ: validation lỗi)
                                        var errors = JSON.parse(xhr.responseText).errors;
                                        var errorMessage = '';
                                        for (var field in errors) {
                                            errorMessage += errors[field].join(' ') + '\n';
                                        }
                                        $('#notificationMessage').text(errorMessage);
                                        console.log(xhr.responseText); // Kiểm tra lỗi chi tiết
                                        if (xhr.status === 422) {
                                            // Nếu có lỗi từ server (ví dụ: validation lỗi)
                                            var errors = JSON.parse(xhr.responseText).errors;
                                            var errorMessage = '';
                                            for (var field in errors) {
                                                errorMessage += errors[field].join(' ') + '\n';
                                            }
                                            $('#notificationMessage').text(errorMessage);
                                        } else {
                                            $('#notificationBar').removeClass('alert-success').addClass(
                                                'alert-danger');
                                            $('#notificationMessage').text(response.message);
                                            $('#notificationBar').fadeIn().delay(3000).fadeOut();
                                        }
                                    },
                                    error: function(xhr, status, error) {
                                        console.log(xhr.responseText); // Kiểm tra lỗi chi tiết
                                        if (xhr.status === 422) {
                                            // Nếu có lỗi từ server (ví dụ: validation lỗi)
                                            var errors = JSON.parse(xhr.responseText).errors;
                                            var errorMessage = '';
                                            for (var field in errors) {
                                                errorMessage += errors[field].join(' ') + '\n';
                                            }
                                            $('#notificationMessage').text(errorMessage);
                                        } else {
                                            $('#notificationMessage').text(
                                                'An error occurred. Please try again.');
                                        }
                                        $('#notificationBar').removeClass('alert-success').addClass(
                                            'alert-danger');
                                        $('#notificationBar').fadeIn().delay(3000).fadeOut();
                                    }
                                });
                        });
                });
</script>
<script>
    $('#payment-form').on('submit', function(e) {
        e.preventDefault();

        var paymentMethod = $('input[name="payment_method"]:checked').val();
        var totalPrice = $('#total-price').text();
        var shippingAddressId = $('#shipping-address').val();

        $.ajax({
            url: '/order/process', // Đảm bảo URL chính xác
            method: 'POST',
            data: {
                payment_method: paymentMethod,
                totalPrice: totalPrice,
                shippingAddressId: shippingAddressId,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.message === 'Order and payment created successfully!') {
                    alert(response.message);
                    window.location.href = '/order/success'; // Redirect to success page
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to process the order.');
                console.error(xhr.responseText);
            }
        });
    });
</script>
