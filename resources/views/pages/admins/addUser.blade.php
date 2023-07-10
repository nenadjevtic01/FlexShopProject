@extends('layouts.admin')
@section('title')
    Flex Shop - Add user
@endsection
@section('description')
    Add user
@endsection
@section('content')
    <div id="content">
    @include('fixed.admins.navbar')
    <section class='section-margin--small mb-5'>
        <div class='container d-flex justify-content-center'>
            <div class='col-12 col-md-9 col-lg-6 mt-3 d-flex flex-column align-items-center'>
                <h3 class='center mb-5'>Add user</h3>
                <form class='row login_form' action='/adduser' method="POST" >
                    @csrf
                    <div class='col-md-12 col-lg-6 form-group my-3'>
                        <input type='text' class='form-control' name='first_name' placeholder='First name'/>
                    </div>
                    <div class='col-md-12 col-lg-6 form-group my-3'>
                        <input type='text' class='form-control' name='last_name' placeholder='Last name'/>
                    </div>
                    <div class='col-md-12 form-group my-3'>
                        <input type='text' class='form-control' name='username' placeholder='Username'/>
                    </div>
                    <div class='col-md-12 form-group my-3'>
                        <input type='text' class='form-control' name='email' placeholder='Email Address'/>
                    </div>
                    <div class='col-md-12 form-group my-3'>
                        <select name="role" class="custom-select">
                            <option value='1'>Administrator</option>
                            <option value='2'>User</option>
                        </select>
                    </div>
                    <div class='col-md-12 form-group my-3'>
                        <input type='password' class='form-control' name='password' placeholder='Password'/>
                    </div>
                    <div class='col-md-12 form-group my-3'>
                        <input type='password' class='form-control' name='confirmPassword' placeholder='Confirm Password'/>
                    </div>
                    <div class='col-md-12 form-group my-3'>
                        <button type='submit' class='btn btn-info w-100'>Add user</button>
                    </div>
                    <hr class="my-4">
                    @if(session('success-msg'))
                        <div class="alert alert-success col-md-12 rounded-lg">
                            <p>
                                @if (session('success-msg'))
                                    {{session('success-msg')}}
                                @endif
                            </p>
                        </div>
                    @endif
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
    </section>
    </div>
@endsection
