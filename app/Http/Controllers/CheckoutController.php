<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\Exception\ExtensionFileException;

class CheckoutController extends Controller
{
    public function index(){
        $checkoutModel=new Checkout();
        $checkoutProducts=$checkoutModel->checkoutProducts();
        $cartId=[];
        if(session()->has('user')){
            $cart=$checkoutModel->fetchCart();
            $user=$checkoutModel->fetchUser();
            foreach ($cart as $c){
                array_push($cartId,$c->product_id);
            }
            $this->data['userInfo']=$user;
            $this->data['cartProducts']=$checkoutProducts;
            $this->data['cart']=$cart;

        }else{
            $cart=session('cart');
            foreach ($cart as $c){
                array_push($cartId,$c->product_id);
            }
            $this->data['cartProducts']=$checkoutProducts;
            $this->data['cart']=$cart;
        }


        return view('pages.checkout',['data'=>$this->data]);
    }

    function confirmOrder(Request $request){
        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $email=$request->email;
        $postal_code=$request->postal_code;
        $country=$request->country;
        $city=$request->city;
        $address=$request->address;

        try {
            $checkoutModel=new Checkout();
            $user=0;
            if(session()->has('user')){
                $cart=$checkoutModel->fetchCart();
                $user=1;
            }else{
                $cart=session('cart');
            }
            $checkoutModel->insertOrder($first_name,$last_name,$email,$postal_code,$country,$city,$address,$cart);
                if($user){
                    $checkoutModel->emptyCart();
                }else{
                    session()->forget('cart');
                }
                return true;
        }catch(\Exception $e){
            return false;
        }
    }
}
