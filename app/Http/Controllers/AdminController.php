<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Message;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\Statistic;
use App\Models\User;
use Couchbase\QueryException;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $this->data['message']=Message::all();
        $productModel=new Product();
        $this->data['products']=$productModel->fetchProductsInfo();
        $receiptModel=new Receipt();
        $userModel=new User();
        $this->data['earningsMonthly']=30*($receiptModel->ShowEarnings());
        $this->data['earningsYearly']=365*($receiptModel->ShowEarnings());
        $this->data['orders']=$receiptModel->showOrders();
        $this->data['users']=User::all();
        $this->data['statistics']=Statistic::all();
        $this->data['userCount']=$userModel->userCount();

        return view('pages.admins.home',['data'=>$this->data]);
    }

    public function clearStats(){
        Statistic::truncate();

        return redirect()->back();
    }

    public function unblockUser($id){
        $user=\DB::table('users')
            ->where('users.user_id','=',$id)
            ->update([
                'is_banned'=>0
            ]);

        return redirect()->back();
    }

    public function blockUser($id){
        $user=\DB::table('users')
            ->where('users.user_id','=',$id)
            ->update([
                'is_banned'=>1
            ]);

        return redirect()->back();
    }

    public function showOrders(){
        $this->data['orders']=Receipt::all();
        return view('pages.admins.orders',['data'=>$this->data]);
    }

    public function showSingleReceipt($id){
        $receiptModel=new Receipt();
        $this->data['orderDetails']=$receiptModel->fetchSingleOrder($id);
        return view('pages.admins.single_order',['data'=>$this->data]);
    }

    public function updateProduct($id){
        $productModel=new Product();
        $product=$productModel->fetchProductForUpdate($id);
        $this->data['productUpdate']=$product;

        return view('pages.admins.updateProduct',['data'=>$this->data]);
    }

    public function updateProductPrice(UpdateProductRequest $request){
        try {
            $product_name=$request->product_name;
            $price=$request->price;
            $id=$request->id;
            $material=$request->material;
            $coo=$request->coo;
            $productModel=new Product();
            $productModel->updateProduct($product_name,$price,$id,$material,$coo);

            return redirect()->back()->with('success-msg', 'Product updated!');
        }catch(\Exception $e){
            return redirect()->back()->with('error-msg', $e->getMessage());
        }

    }
}
