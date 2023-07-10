@extends('layouts.admin')
@section('title')
    Flex Shop - Order details
@endsection
@section('description')
    Single order
@endsection
@section('content')
    <div id="content">
    @include('fixed.admins.navbar')
        <div class="container-fluid">
        <div class="section">
            <div class="card shadow mb-4">
                <div class="card-header py-3 w-100">
                    <h6 class="m-0 font-weight-bold text-primary">Order details</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(count($data['orderDetails']))
                        <table class="table table-bordered w-100">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['orderDetails'] as $o)
                                <tr>
                                    <td><a href="/products/{{$o->product_id}}">{{$o->product_name}}</a></td>
                                    <td>${{$o->price}}</td>
                                    <td>{{$o->size}}</td>
                                    <td>{{$o->quantity}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h6>No details about order</h6>
                        @endif
                    </div>
                </div>
            </div>
            <a href="/orders" class="btn btn-success">Go back</a>
        </div>
        </div>
    </div>
@endsection
