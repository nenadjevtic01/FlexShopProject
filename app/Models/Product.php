<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    public function fetchProducts(Request $request){
        $proizvodi= DB::table('products')
            ->join('pictures','products.product_id','=','pictures.product_id')
            ->join('prices','products.product_id','=','prices.product_id');
        if($request->has('category')){
            $proizvodi=$proizvodi->whereIn('products.category_id',$request->get('category'));
        }
        if($request->has('brand')){
            $proizvodi=$proizvodi->whereIn('products.brand_id',$request->get('brand'));
        }
        if($request->has('gender')){
            $proizvodi=$proizvodi->whereIn('products.gender_id',$request->get('gender'));
        }
        if($request->has('search')){
            $proizvodi=$proizvodi->where('products.product_name','like','%'.$request->get('search').'%');
        }

        if($request->has('price')){
            $price=$request->get('price');
                if($price==1){
                    $proizvodi=$proizvodi->WhereBetween('prices.newPrice',[0,20]);
                }
                if($price==2){
                    $proizvodi=$proizvodi->WhereBetween('prices.newPrice',[20,40]);
                }
                if($price==3){
                    $proizvodi=$proizvodi->WhereBetween('prices.newPrice',[40,60]);
                }
        }
        if($request->has('gender') || $request->has('brand') || $request->has('category') || $request->has('search') || $request->has('price')){
            session()->put('filter',[
                'brand'=>$request->get('brand'),
                'category'=>$request->get('category'),
                'gender'=>$request->get('gender'),
                'search'=>$request->get('search'),
                'price'=>$request->get('price')
            ]);
        }
        $proizvodi=$proizvodi->select('products.*','prices.oldPrice','prices.newPrice','pictures.src','pictures.alt');
        return $proizvodi->paginate(15)->withQueryString();
    }

    public function fetchOne($id){
        $productInfo=\DB::table('products')
            ->join('pictures','products.product_id','=','pictures.picture_id')
            ->join('prices','products.product_id','=','prices.product_id')
            ->join('categories','categories.category_id','=','products.category_id')
            ->join('brands','brands.brand_id','=','products.brand_id')
            ->join('genders','genders.gender_id','=','products.gender_id')
            ->where('products.product_id','=',$id)
            ->select('products.*','prices.oldPrice','prices.newPrice','pictures.src','pictures.alt','genders.gender_name','brands.brand_name','categories.category_name')
            ->first();

            return $productInfo;
    }

    public function fetchProductForUpdate($id){
        $product=\DB::table('products')
            ->join('prices','products.product_id','=','prices.product_id')
            ->where('products.product_id','=',$id)
            ->select('products.product_id','products.product_name','prices.newPrice','products.material','products.coo')
            ->first();

        return $product;
    }

    public function fetchSizes($id){
        $productSizes=\DB::table('sizes')
            ->join('products_sizes','products_sizes.size_id','=','sizes.size_id')
            ->where('products_sizes.product_id','=',$id)
            ->select('sizes.size_name')->get();

        return $productSizes;
    }

    public function fetchProductScroller(){
        $products=\DB::table('products')
            ->join('pictures','pictures.product_id','=','products.product_id')
            ->join('prices','prices.product_id','=','products.product_id')
            ->where('products.sale','=','1')
            ->select('products.product_id','products.product_name','pictures.src','pictures.alt','prices.newPrice','prices.oldPrice')->get();
        return $products;
    }

    public function fetchProductsHome(){
        $products=\DB::table('products')
            ->join('pictures','pictures.product_id','=','products.product_id')
            ->join('prices','prices.product_id','=','products.product_id')
            ->select('products.product_id','products.product_name','pictures.src','pictures.alt','prices.newPrice','prices.oldPrice')
            ->inRandomOrder()
            ->limit(8)
            ->get();
        return $products;
    }

    public function fetchProductsInfo(){
        $products=\DB::table('products')
            ->join('categories','products.category_id','=','categories.category_id')
            ->join('brands','products.brand_id','=','brands.brand_id')
            ->join('genders','genders.gender_id','=','products.gender_id')
            ->join('prices','prices.product_id','=','products.product_id')
            ->select('products.product_id','products.product_name','categories.category_name','brands.brand_name','genders.gender_name','prices.newPrice','products.sale','products.inStock')
            ->get();
        return $products;
    }

    public function updateProduct($product_name,$price,$id,$material,$coo){
        $oldPrice=\DB::table('prices')
            ->where('prices.product_id','=',$id)
            ->select('prices.newPrice')
            ->first();
        $oldPrice=$oldPrice->newPrice;
        if($oldPrice!=$price){
            $product=\DB::table('products')
                ->join('prices','products.product_id','=','prices.product_id')
                ->where('products.product_id','=',$id)
                ->update([
                    'prices.oldPrice'=>$oldPrice,
                    'prices.newPrice'=>$price,
                    'products.product_name'=>$product_name,
                    'products.material'=>$material,
                    'products.coo'=>$coo
                ]);
        }else{
            $product=\DB::table('products')
                ->join('prices','products.product_id','=','prices.product_id')
                ->where('products.product_id','=',$id)
                ->update([
                    'products.product_name'=>$product_name,
                    'products.material'=>$material,
                    'products.coo'=>$coo
                ]);
        }


        return $product;
    }
}
