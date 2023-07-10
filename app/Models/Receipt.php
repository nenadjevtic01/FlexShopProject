<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function ShowEarnings(){
        $total=\DB::table('receipts')
            ->sum('receipts.total');

        return $total;
    }

    public function showOrders(){
        $count=\DB::table('receipts')
            ->count('receipts.receipt_id');

        return $count;
    }

    public function fetchSingleOrder($id){
        $orderDetails=\DB::table('receipt_item')
            ->join('products','products.product_id','=','receipt_item.product_id')
            ->where('receipt_item.receipt_id','=',$id)
            ->select('receipt_item.receipt_id','products.product_id','products.product_name','receipt_item.price','receipt_item.size','receipt_item.quantity')
            ->get();

        return $orderDetails;
    }
}
