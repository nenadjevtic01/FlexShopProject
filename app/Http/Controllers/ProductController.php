<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $model=new Product();
        $proizvodi=$model->fetchProducts($request);
        $filters=session('filter');
        $this->data['categoryId']=null;
        $this->data['brandId']=null;
        $this->data['genderId']=null;
        $this->data['search']=null;
        $this->data['price']=null;
        if($filters){
            if($filters['category']){
                $this->data['categoryId']=$filters['category'];
            }
            if($filters['brand']){
                $this->data['brandId']=$filters['brand'];
            }
            if($filters['gender']){
                $this->data['genderId']=$filters['gender'];
            }
            if($filters['search']){
                $this->data['search']=$filters['search'];
            }
            if($filters['price']){
                $this->data['price']=$filters['price'];
            }
        }
        $this->data['category']=Category::all();
        $this->data['brand']=Brand::all();
        $this->data['size']=Size::all();
        $this->data['products']=$proizvodi;
        return view('pages.shop',['data'=>$this->data]);
    }

    public function showOne($id){
        $model=new Product();
        $productInfo=$model->fetchOne($id);
        $productSizes=$model->fetchSizes($id);
        $productScroller=$model->fetchProductScroller();
        $this->data['productScroller']=$productScroller;
        $this->data['productInfo']=$productInfo;
        $this->data['productSizes']=$productSizes;
        return view('pages.singleProduct',['data'=>$this->data]);
    }
}
