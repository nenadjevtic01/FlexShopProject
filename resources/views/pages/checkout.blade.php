@extends('layouts.layout')
@section('title')
    Flex Shop - Checkout
@endsection
@section('keywords')
    checkout, product, cart, shop
@endsection
@section('description')
    Checkout page
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Home</a>
                    <a class="breadcrumb-item text-dark" href="/products">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        @if(session()->has('user'))
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John" value="{{session('user')->first_name}}" id="first_name">
                            <p id="errorFirstName" class="hidden pt-1"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe" value="{{session('user')->last_name}}" id="last_name">
                            <p id="errorLastName" class="hidden pt-1"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com" value="{{session('user')->email}}" id="email">
                            <p id="errorEmail" class="hidden pt-1"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            @if($data['userInfo'])
                                <input class="form-control" type="text" placeholder="123 Street" value="{{$data['userInfo']->address}}" id="address">
                            @else
                                <input class="form-control" type="text" placeholder="123 Street" id="address">
                            @endif
                                <p id="errorAddress" class="hidden pt-1"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            @if($data['userInfo'])
                            <select class="custom-select" id="country">
                                @if($data['userInfo']->country=='')
                                    <option value="" selected>Select country</option>
                                @else
                                    <option value="">Select country</option>
                                @endif
                                @if($data['userInfo']->country=='Serbia')
                                    <option value="Serbia" selected>Serbia</option>
                                @else
                                    <option value="Serbia">Serbia</option>
                                @endif
                                @if($data['userInfo']->country=='Russia')
                                    <option value="Russia" selected>Russia</option>
                                @else
                                    <option value="Russia">Russia</option>
                                @endif
                                @if($data['userInfo']->country=='United States')
                                    <option value="United States" selected>United States</option>
                                @else
                                    <option value="United States">United States</option>
                                @endif
                                @if($data['userInfo']->country=='Croatia')
                                    <option value="Croatia" selected>Croatia</option>
                                @else
                                    <option value="Croatia">Croatia</option>
                                @endif
                                @if($data['userInfo']->country=='Bosnia and Herzegovina')
                                   <option value="Bosnia and Herzegovina" selected>Bosnia and Herzegovina</option>
                                @else
                                   <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                @endif
                                @if($data['userInfo']->country=='Montenegro')
                                    <option value="Montenegro" selected>Montenegro</option>
                                @else
                                    <option value="Montenegro">Montenegro</option>
                                @endif
                            </select>
                            @else
                                <select class="custom-select" name="country" id="country">
                                    <option value="" selected>Select country</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Russia">Russia</option>
                                    <option value="United States">United States</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Montenegro">Montenegro</option>
                                </select>
                            @endif
                            <p id="errorCountry" class="hidden pt-1"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            @if($data['userInfo'])
                                <input class="form-control" type="text" placeholder="New York" value="{{$data['userInfo']->city}}" id="city">
                            @else
                                <input class="form-control" type="text" placeholder="New York" id="city">
                            @endif
                            <p id="errorCity" class="hidden pt-1"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            @if($data['userInfo'])
                                <input class="form-control" type="text" placeholder="123" value="{{$data['userInfo']->postal_code}}" id="postal_code">
                            @else
                                <input class="form-control" type="text" placeholder="123" id="postal_code">
                            @endif
                            <p id="errorZip" class="hidden pt-1"></p>
                        </div>
{{--                        <div class="col-md-12 justify-content-center  d-flex">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>--}}
                        @else
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John" id="first_name">
                                <p id="errorFirstName" class="hidden pt-1"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe" id="last_name">
                                <p id="errorLastName" class="hidden pt-1"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com" id="email">
                                <p id="errorEmail" class="hidden pt-1"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street" id="address">
                                <p id="errorAddress" class="hidden pt-1"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select" id="country">
                                    <option value="" selected>Select country</option>
                                    <option value="Serbia">Serbia</option>
                                    <option value="Russia">Russia</option>
                                    <option value="United States">United States</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Montenegro">Montenegro</option>
                                </select>
                                <p id="errorCountry" class="hidden pt-1"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York"  id="city">
                                <p id="errorCity" class="hidden pt-1"></p>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123" id="postal_code">
                                <p id="errorZip" class="hidden pt-1"></p>
                            </div>
  {{--                          <div class="col-md-12 justify-content-center  d-flex">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                                </div>
                            </div>--}}
                        @endif
                    </div>
                </div>
{{--                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select" name="country">
                                    <option value="Serbia" selected>Serbia</option>
                                    <option value="Russia">Russia</option>
                                    <option value="United States">United States</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="Montenegro">Montenegro</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        @for($i=0;$i<count($data['cart']);$i++)
                            @for($j=0;$j<count($data['cartProducts']);$j++)
                                @if($data['cart'][$i]->product_id==$data['cartProducts'][$j]->product_id)
                                    <div class="d-flex justify-content-between">
                                        <a href="/products/{{$data['cart'][$i]->product_id}}">{{$data['cartProducts'][$j]->product_name}} ({{$data['cart'][$i]->size}})</a>
                                        <div class="d-flex">
                                            <p>x</p>
                                            <p>{{$data['cart'][$i]->qty}}</p>
                                        </div>
                                        <p class="price">${{$data['cart'][$i]->qty*$data['cartProducts'][$j]->newPrice}}.00</p>
                                    </div>
                                    @break
                                @endif
                            @endfor
                        @endfor
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="subtotal"></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10.00</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="total"></h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" checked name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" id="submitOrder">Place Order</button>
                        <p class="hidden checkoutStatus pt-2" id="status"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
