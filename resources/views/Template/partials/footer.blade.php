</div>
</div>
</div>
<div class="row">
<div class="col-md-12 text-center">

  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
</div>
</div>
</div>
</footer>


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
<script>
    // document.getElementById('registerForm').addEventListener('submit', function(event) {
    //     const password = document.getElementById('password').value;
    //     const confirmPassword = document.getElementById('password_confirmation').value;

    //     if (password !== confirmPassword) {
    //         event.preventDefault();
    //         document.getElementById('error-message').style.display = 'block';
    //     } else {
    //         document.getElementById('error-message').style.display = 'none';
    //     }
    // });

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
                    if (response.status === 'success') {
                        $('#notificationBar').removeClass('alert-danger').addClass(
                            'alert-success');
                        $('#notificationMessage').text(response.message);
                        $('#notificationBar').fadeIn().delay(3000).fadeOut();
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1500);
                    } else {
                        $('#notificationBar').removeClass('alert-success').addClass(
                            'alert-danger');
                        $('#notificationMessage').text(response.message);
                        $('#notificationBar').fadeIn().delay(3000).fadeOut();
                    }
                },
                error: function(xhr, status, error) {
                    $('#notificationBar').removeClass('alert-success').addClass(
                        'alert-danger');
                    $('#notificationMessage').text('An error occurred. Please try again.');
                    $('#notificationBar').fadeIn().delay(3000).fadeOut();
                }
            });
        });
    });
</script>