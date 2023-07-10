<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function fetchBrands(){
        $brands=\DB::table('brands')
            ->join('products','products.brand_id','=','brands.brand_id')
            ->select('brands.brand_id','brands.brand_name',\DB::raw('count(products.product_id) as product_number'))
            ->groupBy('brands.brand_id','brands.brand_name')->get();

        return $brands;
    }

    public function fetchBrandImage(){
        \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        $brands=\DB::table('products')
            ->join('pictures','products.product_id','=','pictures.product_id')
            ->select('products.brand_id','pictures.src','pictures.alt')
            ->groupBy('products.brand_id')->get();
        \DB::statement("SET sql_mode=(SELECT CONCAT(@@sql_mode, ',ONLY_FULL_GROUP_BY'));");
        return $brands;
    }
}
