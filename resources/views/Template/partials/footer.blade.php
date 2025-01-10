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
                    @if($shops)
                        <h2 class="ftco-heading-2">{{ $shops->shopName }}</h2>
                        <p>{{ $shops->describe }}</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="{{ $shops->twitter }}"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="{{ $shops->facebook }}"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="{{ $shops->instagram }}"><span class="icon-instagram"></span></a></li>
                        </ul>
                    @else
                        <h2 class="ftco-heading-2">Shop Name</h2>
                        <p>No description available.</p>
                    @endif
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
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="contact" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            @if($shops)
                                <li><span class="icon icon-map-marker"></span><span class="text">{{ $shops->address }}</span></li>
                                <li><a href="tel:{{ $shops->phone }}"><span class="icon icon-phone"></span><span class="text">{{ $shops->phone }}</span></a></li>
                                <li><a href="mailto:{{ $shops->email }}"><span class="icon icon-envelope"></span><span class="text">{{ $shops->email }}</span></a></li>
                            @else
                                <li><span class="icon icon-map-marker"></span><span class="text">Address not available</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">Phone not available</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Email not available</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>


<!-- Loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"></circle>
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
