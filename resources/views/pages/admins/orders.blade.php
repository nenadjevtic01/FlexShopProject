@extends('layouts.admin')
@section('title')
    Flex Shop - Orders
@endsection
@section('description')
    Orders
@endsection
@section('content')
    <div id="content">
    @include('fixed.admins.navbar')
        <div class="section">
            <div class="card shadow mb-4">
                <div class="card-header py-3 w-100">
                    <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if(count($data['orders']))
                        <table class="table table-bordered w-100">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Full Address</th>
                                <th>Country</th>
                                <th>Total</th>
                                <th>Order date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['orders'] as $o)
                                <tr>
                                    <td>{{$o->receipt_id}}</td>
                                    <td>{{$o->first_name.' '.$o->last_name}}</td>
                                    <td>{{$o->email}}</td>
                                    <td>{{$o->address.', '.$o->city.' '.$o->zip}}</td>
                                    <td>{{$o->country}}</td>
                                    <td>${{$o->total}}</td>
                                    <td>{{$o->date}}</td>
                                    <td>
                                        <a href="/orders/{{$o->receipt_id}}" class="btn btn-info">Show receipt</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h6>No orders</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
