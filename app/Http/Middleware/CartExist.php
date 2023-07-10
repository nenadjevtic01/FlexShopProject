<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;

class CartExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('user')){
            $cartModel=new Cart();
            $cart=$cartModel->fetchCart();
            if(count($cart)!=0){
                return $next($request);
            }else{
                return redirect('/products');
            }
        }elseif(session()->has('cart') && count(session('cart'))!=0){
            return $next($request);
        }else{
            return redirect('/products');
        }
    }
}
