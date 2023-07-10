<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function cartProducts(){
        $products=\DB::table('products')
            ->join('pictures','products.product_id','=','pictures.product_id')
            ->join('prices','prices.product_id','=','products.product_id')
            ->select('products.product_id','products.product_name','pictures.src','pictures.alt','prices.newPrice')
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

    public function existInCart($size,$product_id,$user_id){
        $product=\DB::table('cart')
            ->where('cart.user_id','=',$user_id)
            ->where('cart.size','=',$size)
            ->where('cart.product_id','=',$product_id)
            ->select('*')->get();

        return count($product);
    }

    public function removeFromCart($product_id,$size){
        $user_id=session('user')->user_id;
        $product=\DB::table('cart')
            ->where('cart.user_id','=',$user_id)
            ->where('cart.size','=',$size)
            ->where('cart.product_id','=',$product_id)
            ->delete();

        return $product;
    }

    public function oldQuantity($product_id,$size,$user_id){
        $qtyOld=\DB::table('cart')
            ->where('cart.product_id','=',$product_id)
            ->where('cart.size','=',$size)
            ->where('cart.user_id','=',$user_id)
            ->select('cart.qty')
            ->first();

        return $qtyOld;
    }

    public function updateQuantity($product_id,$size,$user_id,$qty){
        \DB::table('cart')
            ->where('cart.product_id','=',$product_id)
            ->where('cart.size','=',$size)
            ->where('cart.user_id','=',$user_id)
            ->update(['cart.qty'=>$qty]);
    }

    public function insertIntoCart($product_id,$size,$user_id,$qty){
        \DB::table('cart')->insert([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'qty'=>$qty,
            'size'=>$size
        ]);
    }
}
