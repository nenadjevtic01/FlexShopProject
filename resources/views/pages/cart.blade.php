@extends('layouts.layout')
@section('title')
    Flex Shop - Cart
@endsection
@section('keywords')
    cart, shop, online
@endsection
@section('description')
    Cart
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Home</a>
                    <a class="breadcrumb-item text-dark" href="/products">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Size</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if($data['cart']!=null)
                            @if(count($data['cart'])!=0)
                            @for($i=0;$i<count($data['cart']);$i++)
                                @for($j=0;$j<count($data['cartProducts']);$j++)
                                    @if($data['cart'][$i]->product_id==$data['cartProducts'][$j]->product_id)
                                        <tr>
                                            <td class="align-middle"><img src="{{asset('assets/'.$data['cartProducts'][$j]->src)}}" alt="{{$data['cartProducts'][$j]->alt}}" style="width: 50px;">
                                                <a href="/products/{{$data['cartProducts'][$j]->product_id}}">{{$data['cartProducts'][$j]->product_name}}</a></td>
                                            <td class="align-middle">${{doubleval($data['cartProducts'][$j]->newPrice)}}.00</td>
                                            <td class="align-middle">x{{$data['cart'][$i]->qty}}
                                            </td>
                                            <td class="align-middle">{{$data['cart'][$i]->size}}</td>
                                            <td class="align-middle"><p class="price mx-auto">${{$data['cart'][$i]->qty*$data['cartProducts'][$j]->newPrice}}.00</p></td>
                                            <td class="align-middle"><button class="btn btn-sm btn-danger" onclick="deleteProductFromCart('{{$data['cart'][$i]->size}}',{{$data['cart'][$i]->product_id}})"><i class="fa fa-times"></i></button></td>
                                        </tr>
                                    @endif
                                @endfor
                            @endfor
                            @else
                                <tr>
                                    <td colspan="6">Empty</td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="6">Empty</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <p id="status" class="hidden"></p>
            </div>
            <div class="col-lg-4">
                @if($data['cart']!=null)
                    @if(count($data['cart'])!=0)
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="subtotal"></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="total"></h5>
                        </div>
                        <a href="/checkout" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
                    @else
                        <div class="bg-light p-30 mb-5">
                            <div class="pt-2">
                                <a href="/products" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Browse products</a>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="bg-light p-3 mb-5 d-flex justify-content-center">
                        <div class="pt-2 w-75">
                            <a href="/products" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Browse products</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
