@extends('layouts.layout')
@section('title')
    Flex Shop - {{$data['productInfo']->product_name}}
@endsection
@section('keywords')
    product, single
@endsection
@section('description')

@endsection
@section('content')
{{--    {{session()->forget('cart')}}--}}
{{--    {{dd(session('cart'))}}--}}
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Home</a>
                    <a class="breadcrumb-item text-dark" href="/products">Shop</a>
                    <span class="breadcrumb-item active">{{$data['productInfo']->product_name}}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('assets/'.$data['productInfo']->src)}}" alt="{{$data['productInfo']->alt}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{$data['productInfo']->product_name}}</h3>
                    <div class="d-flex mb-3">

                    </div>
                    <div class="d-flex">
                        @if($data['productInfo']->oldPrice!=null)
                            <h3 class="text-danger font-weight-semi-bold mb-4 mr-4">${{$data['productInfo']->newPrice}}</h3>
                            <h5 style="text-decoration: line-through" class="font-weight-semi-bold mt-1 strike">${{$data['productInfo']->oldPrice}}</h5>
                        @else
                            <h3 class="font-weight-semi-bold mb-4 mr-4">${{$data['productInfo']->newPrice}}</h3>
                        @endif
                    </div>
                    <p class="mb-4">
                        Category: {{$data['productInfo']->category_name}}
                        <hr>
                        Brand: {{$data['productInfo']->brand_name}}
                        <hr>
                        Availibility: {{$data['productInfo']->inStock ? 'In stock' : 'Unavailable'}}
                    </p>
                    <div class="d-flex">
                        <form novalidate="novalidate">
                            @if(count($data['productSizes'])!=0)
                            <strong class="text-dark mr-3">Sizes:</strong>
                                @foreach($data['productSizes'] as $p)
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input size" value="{{$p->size_name}}" id="{{$p->size_name}}" name="size">
                                    <label class="custom-control-label" for="{{$p->size_name}}">{{$p->size_name}}</label>
                                </div>
                            @endforeach
                                <p class="hidden text-danger pt-2" id="sizes">Select size.</p>
                            @else
                                <div class="custom-control custom-radio custom-control-inline">
                                    <strong class="text-dark mr-3">Unavailable</strong>
                                </div>
                            @endif
                        </form>
                    </div>
                    @if(count($data['productSizes'])!=0)
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="number" id="qty" min="1" max="99" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3 " onclick="dodajUkorpu({{$data['productInfo']->product_id}})"><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button></br>
                    </div>
                        <p class="hidden text-danger" id="quantityError">Invalid quantity.</p></br>
                        <p class="text" id="status"></p>
                    @else
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary disabled btn-minus" disabled>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="number" id="qty" disabled class=" disabled form-control bg-secondary border-0 text-center" min="1" max="99" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary disabled btn-plus" disabled>
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-primary px-3 disabled" onclick="dodajUkorpu({{$data['productInfo']->product_id}})" disabled><i class="fa fa-shopping-cart mr-1"></i> Add To
                                Cart</button>
                        </div>
                    @endif
                    {{--<div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab">Information</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
{{--                            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Category: {{$data['productInfo']->category_name}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            Brand: {{$data['productInfo']->brand_name}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            Gender: {{$data['productInfo']->gender_name}}
                                        </li>
                                        <li class="list-group-item px-0">

                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Material: {{$data['productInfo']->material}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            Country of origin: {{$data['productInfo']->coo}}
                                        </li>
                                        <li class="list-group-item px-0">
                                            &nbsp;
                                        </li>
                                        <li class="list-group-item px-0">

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">On sale</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($data['productScroller'] as $p)
                        @include('components.sliderProduct')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
