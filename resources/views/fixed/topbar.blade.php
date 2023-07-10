<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-12 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    @if(session()->has('user'))
                        <span class="mr-2 my-auto">Welcome, {{session('user')->first_name.' '.session('user')->last_name}}</span>
                    @endif
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                    @if(session()->has('user'))
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('Logout')}}">Logout</a>
                        </div>
                    @else
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('Login page')}}">Login</a>
                        <a class="dropdown-item" href="{{route('Register page')}}">Sign up</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="/" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Flex</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">011 123 4567</h5>
        </div>
    </div>
</div>
