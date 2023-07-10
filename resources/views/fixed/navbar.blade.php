<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <div class="d-flex align-items-center justify-content-center bg-primary w-100" style="height: 65px; padding: 0 30px;">
                <h6 class="text-dark m-0"><i class="fa fa-solid fa-globe"></i> WORLD OF CLOTHS</h6>
{{--                <i class="fa fa-angle-down text-dark"></i>--}}
            </div>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-uppercase text-dark bg-light px-2">Flex</span>
                    <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        @foreach($data['menu'] as $m)
                        <a href="{{$m->path}}" class="nav-item nav-link">{{$m->title}}</a>
                        @endforeach
                        @if(session()->has('user'))
                            @if(session('user')->role_id==1)
                                    <a href="/adminpanel" class="nav-item nav-link">Admin panel</a>
                            @endif
                        @endif
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="{{route('Cart')}}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span id="numberOfProducts" class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                @if(session()->has('user'))
                                    {{count(\DB::table('cart')->where('cart.user_id','=',session('user')->user_id)->get())}}
                                @elseif(session()->has('cart'))
                                    {{count(session('cart'))}}
                                @else
                                    0
                                @endif
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
