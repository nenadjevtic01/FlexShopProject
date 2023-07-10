<div class="product-item bg-light">
    <div class="product-img position-relative overflow-hidden">
        <img class="img-fluid w-100" src="{{asset('assets/'.$p->src)}}" alt="{{$p->alt}}">
        <div class="product-action">
            <a class="btn btn-outline-dark btn-square" href="/products/{{$p->product_id}}"><i class="fa fa-shopping-cart"></i></a>
        </div>
    </div>
    <div class="text-center py-4">
        <a class="h6 text-decoration-none text-truncate" href="/products/{{$p->product_id}}">{{$p->product_name}}</a>
        <div class="d-flex align-items-center justify-content-center mt-2">
            <h5 class="text-danger">${{$p->newPrice}}</h5>
            @if($p->oldPrice!=null)
            <h6 class="text-muted ml-2"><del>${{$p->oldPrice}}</del></h6>
            @endif
        </div>
        <div class="d-flex align-items-center justify-content-center mb-1">

        </div>
    </div>
</div>
