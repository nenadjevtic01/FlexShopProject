@extends('layouts.layout')
@section('title')
    Flex Shop - Contact
@endsection
@section('keywords')
    contact, form, cloths, product
@endsection
@section('description')
    Contact us.
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="/">Home</a>
                    <span class="breadcrumb-item active">Contact</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Contact Us</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            @if(session()->has('user'))
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                       required="required" data-validation-required-message="Please enter your name" value="{{session('user')->first_name.' '.session('user')->last_name}}"/>
                                <p class="help-block text-danger hidden" id="errorName"></p>
                            @else
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                       required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger hidden" id="errorName"></p>
                            @endif
                        </div>
                        <div class="control-group">
                            @if(session()->has('user'))
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                       required="required" data-validation-required-message="Please enter your email" value="{{session('user')->email}}"/>
                                <p class="help-block text-danger hidden" id="errorEmail"></p>
                            @else
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                       required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger hidden" id="errorEmail"></p>
                            @endif
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject"
                                   required="required" data-validation-required-message="Please enter a subject" />
                            <p class="help-block text-danger hidden" id="errorSubject"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control" rows="8" id="message" placeholder="Message"
                                      required="required"
                                      data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger hidden" id="errorMessage"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="button" id="sendMessageButton">Send
                                Message</button>
                            <p class="help-block pt-1 hidden " id="status"></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px; border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.3586717144576!2d20.482226115312177!3d44.81425718459575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7a9609031735%3A0xc17ed71f59ac4725!2z0JLQuNGB0L7QutCwINCY0KbQoiDRiNC60L7Qu9Cw!5e0!3m2!1ssr!2srs!4v1670364660676!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Zdravka Čelara 16, Beograd, Srbija</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>flexshop_info@gmail.com</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>011 123 4567</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
