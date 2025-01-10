@extends('Template.layouts.app')
@section('title', $viewData['title'])
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
                                <th>Name</th>
                                <th>Price</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($viewData['data'] as $item)
                            
                            <tr class="text-center">
                                <td class="product-remove">
                                    <form action="{{ route('wishlist.remove', ['id' => $item->productId]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="productId" value="{{ $item->productId }}">
                                        <button type="submit" class="btn btn-danger px-3 "><span class="ion-ios-close"></span></button>
                                    </form>
                                </td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url('{{asset("Template/images")."/".$item->image}}');"></div>
                                </td>

                                <td class="product-name">
                                    <h3>{{$item->name}}</h3>
                                </td>
                                <td class="product-name">
                                    <h3>{{ number_format($item->price)}}&#8363;</h3>
                                </td>
 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{$viewData['data']->links('pagination::bootstrap-5')}}
                </div>
            </div>
            
        </div>
    </div>
</section>


@include('Template.components.subcribe')

@endsection