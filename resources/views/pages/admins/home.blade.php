@extends('layouts.admin')
@section('title')
    Flex Shop - Admin panel
@endsection
@section('description')
    Admin page
@endsection
@section('content')
    <div id="content">
    @include('fixed.admins.navbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
 {{--               <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Earnings (Monthly)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($data['earningsMonthly'],2)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earnings (Annual)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($data['earningsYearly'],2)}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['userCount']}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-solid fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Orders</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['orders']}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-solid fa-receipt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 w-100">
                        <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>Message Id</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Sent at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['message'] as $m)
                                    <tr>
                                        <td>{{$m->message_id}}</td>
                                        <td>{{$m->name}}</td>
                                        <td>{{$m->subject}}</td>
                                        <td>{{$m->email}}</td>
                                        <td>{{$m->text}}</td>
                                        <td>{{$m->created_at}}</td>
                                        <td>
                                            @if(!$m->is_answered)
                                                <a href="/answermessage/{{$m->message_id}}" class="btn btn-success">Answer</a>
                                            @else
                                                <button disabled class="btn btn-info">Answered</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 w-100">
                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Registration date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['users'] as $u)
                                    <tr>
                                        <td>{{$u->user_id}}</td>
                                        <td>{{$u->first_name.' '.$u->last_name}}</td>
                                        <td>{{$u->email}}</td>
                                        <td>{{$u->username}}</td>
                                        <td>
                                            @if($u->role_id==1)
                                                Administrator
                                            @else
                                                User
                                            @endif
                                        </td>
                                        <td>{{$u->registration_date}}</td>
                                        <td>
                                            @if($u->is_banned)
                                                @if($u->role_id==2)
                                                    <a href="/unblockuser/{{$u->user_id}}" class="btn btn-warning">Unblock</a>
                                                @else
                                                    <button disabled class="btn btn-info">Forbidden</button>
                                                @endif
                                            @else
                                                @if($u->role_id==2)
                                                    <a href="/blockuser/{{$u->user_id}}" class="btn btn-danger">Block</a>
                                                @else
                                                    <button disabled class="btn btn-info">Forbidden</button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 w-100 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Statistics</h6>
                        @if(count($data['statistics']))
                          <a href="/clearstats" class="btn btn-success">Clear log</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(count($data['statistics']))
                            <table class="table table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['statistics'] as $s)
                                    <tr>
                                        <td>{{$s->name}}</td>
                                        <td>{{$s->email}}</td>
                                        <td>{{$s->action}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <h5>No statistic</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 w-100">
                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered w-100">
                                <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th>Product name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Gender</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>In stock</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['products'] as $m)
                                    <tr>
                                        <td>{{$m->product_id}}</td>
                                        <td>{{$m->product_name}}</td>
                                        <td>{{$m->category_name}}</td>
                                        <td>{{$m->brand_name}}</td>
                                        <td>{{$m->gender_name}}</td>
                                        <td>${{$m->newPrice}}</td>
                                        <td>{{$m->sale ? 'True' : 'False'}}</td>
                                        <td>{{$m->inStock ? 'True' : 'False'}}</td>
                                        <td>
                                            <a href="/updateproduct/{{$m->product_id}}" class="btn btn-success">Update product</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection
