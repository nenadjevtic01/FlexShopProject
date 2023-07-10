@extends('layouts.layout')
@section('title')
    Flex Shop - Shop
@endsection
@section('keywords')
    products, browse, shop, online
@endsection
@section('description')
    Browse all products online.
@endsection

@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Home</a>
                    <span class="breadcrumb-item active">Shop</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <form action="/products" method="GET">
                    @csrf
                    <div class="p-4">
                        <div class=" d-flex align-items-center justify-content-center flex-column">
                            <input type="submit" class="btn btn-primary mb-2" value="Apply/Search">
                            @if(session()->has('filter'))
                                <a class="btn btn-primary" href="/clearfilter">Clear filter</a>
                            @endif
                        </div>
                    </div>
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Search</span></h5>
                    <div class="bg-light p-4 mb-30">
                        <div class=" custom-checkbox d-flex align-items-center justify-content-center">
                            @if($data['search']!=null)
                                <input type="text" name="search" value="{{$data['search']}}" class="form-control"/>
                            @else
                                <input type="text" name="search" placeholder="Search..." class="form-control"/>
                            @endif
                        </div>
                    </div>
                 <!-- Brand Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by brand</span></h5>
                <div class="bg-light p-4 mb-30">
                        @foreach($data['brand'] as $b)
                            @if($data['brandId']!=null)
                                @if(in_array($b->brand_id,$data['brandId']))
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" checked name="brand[]" value='{{$b->brand_id}}' class="custom-control-input" id="{{$b->brand_name}}">
                                        <label class="custom-control-label" for="{{$b->brand_name}}">{{$b->brand_name}}</label>
                                    </div>
                                @else
                                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                        <input type="checkbox" name="brand[]" value='{{$b->brand_id}}' class="custom-control-input" id="{{$b->brand_name}}">
                                        <label class="custom-control-label" for="{{$b->brand_name}}">{{$b->brand_name}}</label>
                                    </div>
                                @endif
                            @else
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="brand[]" value='{{$b->brand_id}}' class="custom-control-input" id="{{$b->brand_name}}">
                                <label class="custom-control-label" for="{{$b->brand_name}}">{{$b->brand_name}}</label>
                            </div>
                           @endif

                        @endforeach
                </div>
                <!-- Brand End -->
                <!-- Brand Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by gender</span></h5>
                <div class="bg-light p-4 mb-30">
                    @if($data['genderId']!=null)
                        @if(in_array(1,$data['genderId']))
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" checked name="gender[]" value='1' class="custom-control-input" id="Male">
                                <label class="custom-control-label" for="Male">Male</label>
                            </div>
                        @else
                            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                <input type="checkbox" name="gender[]" value='1' class="custom-control-input" id="Male">
                                <label class="custom-control-label" for="Male">Male</label>
                            </div>
                        @endif
                        @if(in_array(2,$data['genderId']))
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" checked name="gender[]" value='2' class="custom-control-input" id="Female">
                                    <label class="custom-control-label" for="Female">Female</label>
                                </div>
                        @else
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" name="gender[]" value='2' class="custom-control-input" id="Female">
                                    <label class="custom-control-label" for="Female">Female</label>
                                </div>
                        @endif
                    @else
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="gender[]" value='1' class="custom-control-input" id="Male">
                            <label class="custom-control-label" for="Male">Male</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" name="gender[]" value='2' class="custom-control-input" id="Female">
                            <label class="custom-control-label" for="Female">Female</label>
                        </div>
                    @endif

                </div>
                <!-- Brand End -->
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    @if($data['price']!=null)
                        @if($data['price']==1)
                            <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" checked name="price" value="1" id="price-1">
                                <label class="custom-control-label" for="price-1">$0 - $20</label>
                            </div>
                        @else
                            <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                <input type="radio" class="custom-control-input" name="price" value="1" id="price-1">
                                <label class="custom-control-label" for="price-1">$0 - $20</label>
                            </div>
                        @endif
                        @if($data['price']==2)
                                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                    <input type="radio" checked class="custom-control-input" name="price" value="2" id="price-3">
                                    <label class="custom-control-label" for="price-3">$20 - $40</label>
                                </div>
                        @else
                                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                    <input type="radio" class="custom-control-input" name="price" value="2" id="price-3">
                                    <label class="custom-control-label" for="price-3">$20 - $40</label>
                                </div>
                        @endif
                        @if($data['price']==3)
                                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                    <input type="radio" checked class="custom-control-input" name="price" value="3" id="price-4">
                                    <label class="custom-control-label" for="price-4">$40 - $60</label>
                                </div>
                        @else
                                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                                    <input type="radio" class="custom-control-input" name="price" value="3" id="price-4">
                                    <label class="custom-control-label" for="price-4">$40 - $60</label>
                                </div>
                        @endif
                    @else
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" name="price" value="1" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $20</label>
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" name="price" value="2" id="price-3">
                            <label class="custom-control-label" for="price-3">$20 - $40</label>
                        </div>
                        <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                            <input type="radio" class="custom-control-input" name="price" value="3" id="price-4">
                            <label class="custom-control-label" for="price-4">$40 - $60</label>
                        </div>
                    @endif
                </div>
                <!-- Price End -->

                <!-- Category Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by category</span></h5>
                <div class="bg-light p-4 mb-30">
{{--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>--}}
                        @foreach($data['category'] as $c)
                            @if($data['categoryId']!=null)
                                @if(in_array($c->category_id,$data['categoryId']))
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" checked class="custom-control-input" name="category[]" value="{{$c->category_id}}" id="{{$c->category_name}}">
                                    <label class="custom-control-label" for="{{$c->category_name}}">{{$c->category_name}}</label>
                                </div>
                                @else
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input" name="category[]" value="{{$c->category_id}}" id="{{$c->category_name}}">
                                    <label class="custom-control-label" for="{{$c->category_name}}">{{$c->category_name}}</label>
                                </div>
                               @endif
                            @else
                                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                                    <input type="checkbox" class="custom-control-input" name="category[]" value="{{$c->category_id}}" id="{{$c->category_name}}">
                                    <label class="custom-control-label" for="{{$c->category_name}}">{{$c->category_name}}</label>
                                </div>
                            @endif
                        @endforeach
                </div>
                <!-- Category End -->

                {{--<!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
                <div class="bg-light p-4 mb-30">
                        @foreach($data['size'] as $s)
--}}{{--                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>--}}{{--
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="size[]" id="{{$s->size_name}}">
                            <label class="custom-control-label" for="{{$s->size_name}}">{{$s->size_name}}</label>
                        </div>
                        @endforeach
                </div>--}}

                </form>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                            </div>
                            {{--<div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                    @foreach($data['products'] as $p)
                        @include('components.product',['lg'=>4,'md'=>6,'p'=>$p])
                    @endforeach
{{--                    @for($i=0;$i<count($data['products']);$i++)--}}
{{--                        @include('components.product',['lg'=>4,'md'=>6])--}}
{{--                    @endfor--}}
                    <div class="col-12">
                        <nav class="d-flex justify-content-center">
                            {{$data['products']->links("pagination::bootstrap-4") }}
                            {{--<ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>--}}
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
