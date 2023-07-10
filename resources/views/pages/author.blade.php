@extends('layouts.layout')
@section('title')
    Flex Shop - Author
@endsection
@section('keywords')
    author, site, laravel , php2
@endsection
@section('description')
    Author page
@endsection
@section('content')
    <div class="product_image_area my-5">
        <div class="container py-5" id="jedanProizvod">
            <div class='row s_product_inner proizvodMargin'>
                <div class='col-lg-6 rounded'>
                            <img class='img-fluid col-md-12 authorImage' src='{{asset('assets/img/Author.jpg')}}' alt='Author image'/>
                </div>
                <div class='col-lg-5 offset-lg-1'>
                    <div class='s_product_text d-flex flex-column align-items-center'>
                        <h3 class="pb-5">Author</h3>
                        <p class='authorText font-italic'>Hi, my name is Nenad Jevtić, and I am a desktop and web developer. I was lucky enough to work for several fun, exciting and successful StartUps that helped me to become who I am now. I am always thinking about speed, performance optimisation, scalability and the way to improve workflow for each individual project. Communication with me is simple, you are free to call me anytime you want. I keep up to date with the latest technologies and consider myself a very quick study able to pick up another technology in a very short amount of time as needed.</p>
                        <div>
                            <a class='btn btn-primary mx-2' href='https://nenadjevtic01.github.io/portfolio'>Visit portfolio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
