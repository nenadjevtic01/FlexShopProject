<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brandModel=new Brand();
        $brand=$brandModel->fetchBrands();
        $products=new Product();
        $products=$products->fetchProductsHome();
        $brandImage=$brandModel->fetchBrandImage();
        $this->data['products']=$products;
        $this->data['brandsImage']=$brandImage;
        $this->data['brandsCount']=$brand;
        return view('pages.home',['data'=>$this->data]);
    }
}
