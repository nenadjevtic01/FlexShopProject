<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cartModel=new Cart();
        $cartProducts=$cartModel->cartProducts();
        $cartId=[];
        if(session()->has('user')){
            $cart=$cartModel->fetchCart();
            if($cart){
                foreach ($cart as $c){
                    array_push($cartId,$c->product_id);
                }
                $this->data['cartProducts']=$cartProducts;
                $this->data['cart']=$cart;
            }else{
                $cart=null;
                $this->data['cart']=$cart;
            }

        }elseif(session()->has('cart')){
            $cart=session('cart');
            foreach ($cart as $c){
                array_push($cartId,$c->product_id);
            }
            $this->data['cartProducts']=$cartProducts;
            $this->data['cart']=$cart;
        }else{
            $cart=null;
            $this->data['cart']=$cart;
        }

        return view('pages.cart',['data'=>$this->data]);
    }

    public function addToCart(Request $request){
        $size=$request->size;
        $qty=$request->qty;
        $product_id=$request->product_id;
        $cartModel=new Cart();
        $products=[];
        try {
            if(session()->has('user')){
                $user_id=session('user')->user_id;
                if($cartModel->existInCart($size,$product_id,$user_id)){
                    $qtyOld=$cartModel->oldQuantity($product_id,$size,$user_id);
                    $qty=$qty+$qtyOld->qty;
                    $cartModel->updateQuantity($product_id,$size,$user_id,$qty);
                }else{
                    $cartModel->insertIntoCart($product_id,$size,$user_id,$qty);
                }
            }elseif(session()->has('cart'))
            {
                $cart=session('cart');
                $filterCart= $this->filterCart($cart, $product_id, $size);
                if($filterCart){
                    foreach ($cart as $c){
                        if($c->product_id==$product_id && $c->size==$size){
                            $c->qty=$c->qty+$qty;
                            session()->put('cart',$cart);
                            break;
                        }
                    }
                }else{
                    $product=new \stdClass();
                    $product->size=$size;
                    $product->qty=$qty;
                    $product->product_id=$product_id;
                    $products=session('cart');
                    array_push($products,$product);
                    session()->put('cart',$products);
                }
            }else{
                $product=new \stdClass();
                $product->size=$size;
                $product->qty=$qty;
                $product->product_id=$product_id;
                array_push($products,$product);
                session()->put('cart',$products);
            }
            return true;
        }catch(\Exception $e){
            return false;
        }

    }

    function filterCart($cart,$product_id,$size):int{
        $br=0;
        foreach ($cart as $c){
            if($c->product_id==$product_id && $c->size==$size){
                $br++;
            }
        }

        return $br;
    }


    function removeFromCart(Request $request){
        $product_id=$request->product_id;
        $size=$request->size;
        if(session()->has('user')){
            try {
                $cartModel=new Cart();
                $cartModel->removeFromCart($product_id,$size);
                return true;
            }catch(\Exception $e){
                return false;
            }
        }elseif(session()->has('cart')){
            try {
                $cart=session('cart');
                for($i=0;$i<count($cart);$i++){
                    if($cart[$i]->product_id==$product_id && $cart[$i]->size==$size){
                        unset($cart[$i]);
                        break;
                    }
                }
                session()->put('cart',$cart);
                return true;
            }catch(\Exception $e){
                return false;
            }
        }
    }
}
