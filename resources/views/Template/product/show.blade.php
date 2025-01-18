@extends('Template.layouts.app')
@section('main')

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{ asset('Template/images/'.$viewData['product']->getImage()) }}" class="image-popup"><img src="{{ asset('Template/images/'.$viewData['product']->getImage()) }}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $viewData['product']->getName() }}</h3>

                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2"><span id="rate"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;" ><span id="timesRev"></span> <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <div class="m-2">
                    <div class="badge badge-info p-2" id="pStatus">loading...</div>
                </div>
                <p class="price"><span>{{ number_format($viewData['product']->getPrice(), 0, '.', ',') }}&#8363;</span></p>
                <p>
                    {{ $viewData['product']->getDescription() }}
                    <!-- A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until. -->
                </p>
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <!-- @foreach ($viewData['quantity'] as $inventory)
                            <p id="dquantity" style="color: #000;">{{$inventory->getQuantity()}} kg available</p>
                        @endforeach -->
                        <p id="dquantity" style="color: #000;">loading...</p>
                    </div>
                </div>
                <!-- <a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a> -->
                <div class="mt-4">
                    <div>
                        <form method="post" action="{{route('cart.add', ['id' => $viewData['product']->getProductId()]) }}">
                            @csrf

                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="d-flex px-3">
                                <button id="add_to_cart" type="submit" class="btn bg-black px-5">Add to Cart</button>

                            </div>
                        </form>
                    </div>
                    @if (Auth::check())

                    <div class="p-2 ml-3">
                        <form action="{{route('wishlist.add', ['id' => $viewData['product']->getProductId()])}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $viewData['product']->getProductId() }}">
                            <input type="hidden" name="name" value="{{ $viewData['product']->getName() }}">
                            <input type="hidden" name="image" value="{{ $viewData['product']->getImage() }}">
                            <input type="hidden" name="price" value="{{ $viewData['product']->getPrice() }}">
                            <button type="submit" class="heart d-flex justify-content-center align-items-center text-center btn">
                                Add to Wishlist &nbsp;<i class="ion-ios-heart"></i>
                            </button>
                        </form>

                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Products</span>
                <h2 class="mb-4">Related Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="related_products"></div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Reviews</span>
                <h2 class="mb-4">Khách hàng đánh giá</h2>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- Review Summary --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="review-summary">
                    <h4>Đánh giá trung bình</h4>
                    <p>
                        <strong id="avgRating"></strong> trên 5 sao
                        (<span id="totalReviewsPerProduct"></span> lượt đánh giá)
                    </p>
                    <div></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="review-distribution">
                    <h4>Phân bố đánh giá</h4>
                    <ul id="ratingDistribution" class="list-unstyled"></ul>
                </div>
            </div>
        </div>

        {{-- Individual Reviews --}}
        <div class="row" id=""></div>
        @if (Auth::check())
        <div class="row">
            <span class="subheading">Reviews</span>
            <div id="message"></div>
            <div class="col-md-12">
                <form id="reviewForm">
                    @csrf
                    <input type="hidden" name="productId" id="productId" value="{{ $viewData['product']->getProductId() }}">
                    <div class="form-group">
                        <label for="rating">Chọn số sao:</label>
                        <select name="rating" id="rating" class="form-control" required>
                            <option value="1">1 Sao</option>
                            <option value="2">2 Sao</option>
                            <option value="3">3 Sao</option>
                            <option value="4">4 Sao</option>
                            <option value="5">5 Sao</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Viết đánh giá của bạn:</label>
                        <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                </form>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="#" data-toggle="modal" data-target="#loginModal" class="btn btn-primary">Mua hàng để đánh giá</a></p>
            </div>
        </div>
        @endif

        <div class="row mt-4" id="user_reviews"></div>
        <div class="row mt-4">
            <div class="col text-center">
                <div class="pagination" id="pagination">

                </div>
            </div>
        </div>
    </div>
</section>


@include('Template.components.subcribe')


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const quantityInput = document.getElementById("quantity");
        const minusButton = document.querySelector(".quantity-left-minus");
        const plusButton = document.querySelector(".quantity-right-plus");

        const updateQuantity = (change) => {
            let currentQuantity = parseInt(quantityInput.value, 10) || 1;
            const min = parseInt(quantityInput.min, 10) || 1;
            const max = parseInt(quantityInput.max, 10) || 100;

            let newQuantity = currentQuantity + change;

            if (newQuantity < min) newQuantity = min;
            if (newQuantity > max) newQuantity = max;

            quantityInput.value = newQuantity;
        };

        minusButton.addEventListener("click", () => updateQuantity(-1));
        plusButton.addEventListener("click", () => updateQuantity(1));
    });

    $(document).ready(function() {
        function updateQuantity() {
            let id = `{{$viewData['product']->getProductId() }}`;
            // console.log('id: ', id);

            $.ajax({
                url: `http://127.0.0.1:8000/api/products/${id}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {

                    if (response.product && response.qty >= 0) {
                        let quantity = response.qty;
                        let status = quantity > 0 ? 'In stock' : 'Out of stock';
                        // console.log('Qty: ', quantity);
                        // console.log('status: ', status);
                        // console.log('res: ', response);
                        $('#pStatus').text(status);
                        $('#dquantity').text(quantity + ' kg có sẵn');

                        if (quantity <= 0) {
                            $('#add_to_cart')
                                .prop('disabled', true)
                        }

                    } else {
                        console.log('No inventories found.');
                    }
                },
                error: (error) => console.error('Error: ', error)
            });
        }

        updateQuantity();
        setInterval(updateQuantity, 10000);
    });

    $(document).ready(function() {

        let id = `{{$viewData['product']->getProductId() }}`;
        $.ajax({
            url: `http://127.0.0.1:8000/api/products/${id}/related`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log('res related: ', response);
                if (!response || response.length === 0) {
                    $('#related_products').html('<p>No related products found</p>');
                    return;
                }
                $('#related_products').empty();
                response.forEach(product => {
                    if (product.productId == 6) {
                        $('#related_products').append(productHtml(product, price_dc = 200000));
                    } else {
                        // console.log('product: ', product.name);
                        $('#related_products').append(productHtml(product));
                    }
                });
            },
            error: (error) => console.error('Error: ', error)
        });
    });

    const productHtml = (product, price_dc) => `
        <div class="col-md-6 col-lg-3">
            <div class="product">
                <a href="/products/${product.slug}/${product.productId}" class="img-prod">
                    <img class="img-fluid" src="{{ asset('Template/images') }}/${product.image}" alt=" ${product.name}">
                    <span class="status"></span>
                    <div class="overlay"></div>
                </a>
                <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="#">${product.name}</a></h3>
                    <div class="d-flex">
                        <div class="pricing">
                            <p class="price">
                                <span class="mr-2 price-dc">${price_dc === undefined ? '': formatMoney(price_dc)}</span>
                                <span class="price-sale">${formatMoney(product.price)}</span>
                            </p>
                        </div>
                    </div>
                    <div class="bottom-area d-flex px-3">
                        <div class="m-auto d-flex">
                            <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                <span><i class="ion-ios-menu"></i></span>
                            </a>
                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                <span><i class="ion-ios-cart"></i></span>
                            </a>
                            @if(Auth::check())
                            <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                <span><i class="ion-ios-heart"></i></span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;

    const formatMoney = (price) => new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'VND',
        trailingZeroDisplay: 'stripIfInteger'
    }).format(price);


    $(document).ready(function() {

        const updateRatingDistribution = (distribution, tReviews) => {
            const container = document.getElementById('ratingDistribution');

            container.innerHTML = distribution.map(item => {
                const percentage = ((item.count / tReviews) * 100).toFixed(2);
                return `
                    <li>
                        ${item.rating} Sao: <span>${item.count}</span> lượt đánh giá
                        (<strong>${percentage}%</strong>)
                        <div class="progress">
                            <div class="progress-bar" style="width: ${percentage}%;"></div>
                        </div>
                    </li>
                `;
            }).join('');
        };

        Echo.channel('reviews')
            .listen('ReviewPosted', (event) => {
                console.log('ReviewPosted', event)

                const totalReviews = event.totalReviews;

                const avgRatingElement = document.getElementById('avgRating');
                avgRatingElement.innerHTML = `${event.avgRating.toFixed(1)}`;

                const totalReviewsPerProductElement = document.getElementById('totalReviewsPerProduct');
                totalReviewsPerProductElement.innerHTML = `${totalReviews}`;

                const timesRev = document.getElementById('timesRev');
                timesRev.innerHTML = `${totalReviews}`;
                const rate = document.getElementById('rate');
                rate.innerHTML = `${event.avgRating.toFixed(1)}`;


                updateRatingDistribution(event.ratingDistribution, event.totalReviews);

                const reviewContainer = document.getElementById('user_reviews');
                const newReview = event.newReview;

                reviewContainer.insertAdjacentHTML('afterbegin', review(newReview));
            });
    });


    // get reviews
    $(document).ready(function() {
        let id = `{{$viewData['product']->getProductId() }}`;
        fetchReviews(`http://127.0.0.1:8000/api/userReviews/product/${id}`);

        $(document).on('click', '.page-link', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            if (url) {
                fetchReviews(url);
            }
        });
    });

    function fetchReviews(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#user_reviews').empty();
                    response.data.reviews.data.forEach(data => {
                        $('#user_reviews').append(review(data));
                    });

                    $('#avgRating').text(response.data.average_rating);
                    $('#totalReviewsPerProduct').text(response.data.reviews.total);
                    $('#timesRev').text(response.data.reviews.total);
                    $('#rate').text(response.data.average_rating);

                    const distributionContainer = $('#ratingDistribution');
                    const totalReviews = response.data.total_reviews;
                    distributionContainer.empty();
                    response.data.rating_distribution.forEach(item => {
                        const percentage = ((item.count / totalReviews) * 100).toFixed(2);
                        distributionContainer.append(`
                        <li>
                            ${item.rating} Sao: <span>${item.count}</span> lượt đánh giá
                            (<strong>${percentage}%</strong>)
                            <div class="progress">
                                <div class="progress-bar" style="width: ${percentage}%;"></div>
                            </div>
                        </li>
                    `);
                    });

                    $('#pagination').empty();
                    response.data.reviews.links.forEach(link => {
                        if (link.url) {
                            $('#pagination').append(
                                `<a href="${link.url}" class="page-link ${link.active ? 'active' : ''}">${link.label}</a>`
                            );
                        } else {
                            $('#pagination').append(`<span class="page-link disabled">${link.label}</span>`);
                        }
                    });
                }
            },
            error: function(error) {
                console.error('Error fetching reviews:', error);
            }
        });
    }



    const review = (rev) => {
        let stars = '';
        for (let i = 1; i <= rev.rating; i++) {
            stars += `<span class="ion-ios-star"></span>`;
        }
        for (let i = rev.rating + 1; i <= 5; i++) {
            stars += `<span class="ion-ios-star-outline"></span>`;
        }

        return `
            <div class="col-md-12 mb-4">
                <div class="review">
                    <h5>${rev.user.firstName + ' ' + (rev.user.lastName || '')}</h5>
                    <p>publish at: ${rev.created_at}</p>
                    <p>${stars}</p>
                    <p>${rev.comment}</p>
                </div>
            </div>
        `
    };

    $(document).ready(function() {
        var reviewfrm = $('#reviewForm');

        reviewfrm.submit(function(e) {
            e.preventDefault();

            let frmData = {
                productId: $('#productId').val(),
                rating: $('#rating').val(),
                comment: $('#comment').val(),
            }

            $.ajax({
                url: 'http://127.0.0.1:8000/api/userReviews',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json',
                },
                data: frmData,
                success: function(response) {
                    $('#message').html('<p style="color:green;">' + response.message + '</p>');
                    $('#reviewForm')[0].reset();
                },
                error: function(xhr) {
                    let errMessage = xhr.responseJSON?.message || 'An error occurred';
                    $('#message').html('<p style="color:red;font-size:2em;font-style:italic">' + errMessage + '</p>');
                }
            });
        });
    });
</script>

@endsection