@extends('Template.layouts.app')
@section('main')
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(Template/images/bg_1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-12 ftco-animate text-center">
            <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(Template/images/bg_2.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(Template/images/cac-chuong-trinh-khuyen-mai-hay1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url(Template/images/khuyen-mai-la-gi-1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
            <p><a href="" class="btn btn-primary">View Details</a></p>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>

@include('Template.components.benefits')

<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(Template/images/category.jpg);">
                            <div class="text text-center">
                                <h2>Vegetables</h2>
                                <p>Protect the health of every home</p>
                                <p><a href="#" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(Template/images/category-1.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Fruits</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(Template/images/category-2.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Vegetables</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(Template/images/category-3.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Juices</a></h2>
                    </div>
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(Template/images/category-4.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Dried</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Featured Products</span>
        <h2 class="mb-4">Our Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
            @foreach ($viewData['lastedProducts'] as $product)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{ route('product.show', ['slug' => $product->getSlug(), 'id' => $product->getProductId() ]) }}" class="img-prod">
                            <img class="img-fluid" src="{{ asset('Template/images/'.$product -> getImage()) }}" alt="{{ $product -> getImage() }}">
                            <span class="status"></span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{ route('product.show', ['slug' => $product->getSlug(), 'id' => $product->getProductId() ]) }}">{{ $product -> getName()}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">{{ number_format($product -> getPrice()) }}&#8363</span></p>
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
                                    
                                    @if (Auth::check())
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <form action="{{route('wishlist.add', ['id' => $product->getProductId()])}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->getProductId() }}">
                                            <input type="hidden" name="name" value="{{ $product->getName() }}">
                                            <input type="hidden" name="image" value="{{ $product->getImage() }}">
                                            <input type="hidden" name="price" value="{{ $product->getPrice() }}">
                                            <button type="submit" class="heart d-flex justify-content-center align-items-center ">
                                                <span><i class="ion-ios-heart"></i></span>
                                            </button>
                                        </form>
                                    </a>
                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section img" style="background-image: url(Template/images/bg_3.jpg);">
    <div class="container">
            <div class="row justify-content-end">
      <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
          <span class="subheading">Best Price For You</span>
        <h2 class="mb-4">Deal of the day</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        <h3><a href="#">Spinach</a></h3>
        <span class="price">$10 <a href="#">now $5 only</a></span>
        <div id="timer" class="d-flex mt-5">
                      <div class="time" id="days"></div>
                      <div class="time pl-3" id="hours"></div>
                      <div class="time pl-3" id="minutes"></div>
                      <div class="time pl-3" id="seconds"></div>
                    </div>
      </div>
    </div>
    </div>
</section>

@include('Template.components.customers')

  <hr>
  <section class="ftco-section ftco-partner">
  <div class="container">
      <div class="row">
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="Template/images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="Template/images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="Template/images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="Template/images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
          <div class="col-sm ftco-animate">
              <a href="#" class="partner"><img src="Template/images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
          </div>
      </div>
  </div>
</section>

@include('Template.components.subcribe')

@endsection
