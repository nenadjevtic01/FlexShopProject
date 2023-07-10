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
        <section class='section-margin--small mb-5'>
            <div class='container d-flex justify-content-center'>
                <div class='col-12 col-md-9 col-lg-6 mt-3 d-flex flex-column align-items-center'>
                    <h3 class='center mb-5'>Update product "{{$data['productUpdate']->product_name}}"</h3>
                    <form class='row login_form' action='/updateproduct' method="POST" >
                        @csrf
                        <div class='col-md-12 form-group my-3'>
                            <input type='text' class='form-control' hidden name='id' value="{{$data['productUpdate']->product_id}}"/>
                        </div>
                        <div class='col-md-12 form-group my-3'>
                            Product Name:
                            <input type='text' class='form-control' name='product_name'  placeholder='Enter product name' value="{{$data['productUpdate']->product_name}}" />
                        </div>
                        <div class='col-md-12 form-group my-3'>
                            Price:
                            <input type='text' class='form-control' value="{{$data['productUpdate']->newPrice}}" name='price'/>
                        </div>
                        <div class='col-md-12 form-group my-3'>
                            Material:
                            <input type='text' class='form-control' value="{{$data['productUpdate']->material}}" name='material'/>
                        </div>
                        <div class='col-md-12 form-group my-3'>
                            Country of origin:
                            <input type='text' class='form-control' value="{{$data['productUpdate']->coo}}" name='coo'/>
                        </div>
                        <div class='col-md-12 form-group my-3 d-flex justify-content-center'>
                            <button type='submit' class='btn btn-info w-50'>Update product</button>
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
                            <div class="alert alert-danger col-md-12 w-75 rounded-lg">
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
