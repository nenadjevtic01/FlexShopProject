<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    public function checkoutProducts(){
        $products=\DB::table('products')
            ->join('prices','prices.product_id','=','products.product_id')
            ->select('products.product_id','products.product_name','prices.newPrice')
            ->get();

        return $products;
    }
    public function fetchCart(){
        $user_id=session('user')->user_id;
        $cart=\DB::table('cart')
            ->where('cart.user_id','=',$user_id)
            ->get();

        return $cart;
    }

    public function emptyCart(){
        $user_id=session('user')->user_id;
        $cart=\DB::table('cart')
            ->where('cart.user_id','=',$user_id)
            ->delete();

        return $cart;
    }

    public function fetchUser(){
        $user_id=session('user')->user_id;
        $user=\DB::table('users')
            ->join('infos','users.user_id','=','infos.user_id')
            ->where('users.user_id','=',$user_id)
            ->select('infos.city','infos.postal_code','infos.address','infos.country')
            ->first();

        return $user;
    }

    public function insertOrder($first_name,$last_name,$email,$postal_code,$country,$city,$address,$cart){
            $subtotal=0;
            $products=\DB::table('products')
                ->join('prices','products.product_id','=','prices.product_id')
                ->select('products.product_id','prices.newPrice')
                ->get();
            for($i=0;$i<count($cart);$i++){
                for($j=0;$j<count($products);$j++){
                    if($cart[$i]->product_id==$products[$j]->product_id){
                        $subtotal=$subtotal+($cart[$i]->qty*$products[$j]->newPrice);
                        break;
                    }
                }
            }
            $total=$subtotal+10;
            $id=\DB::table('receipts')
                ->insertGetId([
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'address'=>$address,
                    'city'=>$city,
                    'zip'=>$postal_code,
                    'email'=>$email,
                    'country'=>$country,
                    'subtotal'=>$subtotal,
                    'shipping_fee'=>10,
                    'total'=>$total
                ]);
            for($i=0;$i<count($cart);$i++){
                for($j=0;$j<count($products);$j++){
                    if($cart[$i]->product_id==$products[$j]->product_id){
                        \DB::table('receipt_item')
                            ->insert([
                                'product_id'=>$products[$j]->product_id,
                                'price'=>$products[$j]->newPrice,
                                'size'=>$cart[$i]->size,
                                'quantity'=>$cart[$i]->qty,
                                'receipt_id'=>$id
                            ]);
                        break;
                    }
                }
            }

            return true;
    }


}
