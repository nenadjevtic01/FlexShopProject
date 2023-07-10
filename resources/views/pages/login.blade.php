@extends('layouts.layout')
@section('title')
    Flex Shop - Login
@endsection
@section('keywords')
    login, form, cart, shop
@endsection
@section('description')
    Login to site.
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
                        <form action="{{route('Login')}}" method="POST">
                            @csrf
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign
                                    in</button>
                            </div>
                            <hr class="my-4">
                            @if($errors->any() || session('error-msg'))
                                <div class="alert alert-danger col-md-12 rounded-lg">
                                    <ul>
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        @endif
                                        @if (session('error-msg'))
                                            <li>{{session('error-msg')}}</li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
