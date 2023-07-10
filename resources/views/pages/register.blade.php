@extends('layouts.layout')
@section('title')
    Flex Shop - Registration
@endsection
@section('keywords')
    register, site, products
@endsection
@section('description')
    Register form
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="login_form_inner register_form_inner">
                    <h3 class="py-4">Create an account</h3>
                    <form class="row login_form justify-content-center" action="{{route('Register')}}" method="POST" >
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="First name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First name'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last name'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="address" placeholder="Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Address'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" name="postal_code" placeholder="Postal code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal code'">
                        </div>
                        <div class="col-md-12 form-group">
                            <select class="custom-select" name="country">
                                <option value="Serbia" selected>Serbia</option>
                                <option value="Russia">Russia</option>
                                <option value="United States">United States</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Montenegro">Montenegro</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                        </div>
                        <div class="col-md-6 form-group">
                                <button type="submit" value="Register" class="btn btn-primary btn-login text-uppercase fw-bold w-100 py-2">Register</button>
                        </div>
                            @if($errors->any() || session('error-msg'))
                            <div class="alert alert-danger col-md-9 rounded-lg">
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

@endsection
