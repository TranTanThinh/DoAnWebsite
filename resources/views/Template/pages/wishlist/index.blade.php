@extends('Template.layouts.app')
@section('title', 'Wishlist')
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
                                <th>Product List</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(Template/images/product-1.jpg);"></div>
                                </td>

                                <td class="product-name">
                                    <h3>Bell Pepper</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                

                                

                               
                            </tr><!-- END TR-->

                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(Template/images/product-2.jpg);"></div>
                                </td>

                                <td class="product-name">
                                    <h3>Bell Pepper</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                

                                

                               
                            </tr><!-- END TR-->

                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(Template/images/product-3.jpg);"></div>
                                </td>

                                <td class="product-name">
                                    <h3>Bell Pepper</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                

                                

                               
                            </tr><!-- END TR-->

                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(Template/images/product-4.jpg);"></div>
                                </td>

                                <td class="product-name">
                                    <h3>Bell Pepper</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                

                                

                               
                            </tr><!-- END TR-->

                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(Template/images/product-5.jpg);"></div>
                                </td>

                                <td class="product-name">
                                    <h3>Bell Pepper</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                

                                

                               
                            </tr><!-- END TR-->

                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(Template/images/product-6.jpg);"></div>
                                </td>

                                <td class="product-name">
                                    <h3>Bell Pepper</h3>
                                    <p>Far far away, behind the word mountains, far from the countries</p>
                                </td>

                                

                                

                               
                            </tr><!-- END TR-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


@include('Template.components.subcribe')

@endsection