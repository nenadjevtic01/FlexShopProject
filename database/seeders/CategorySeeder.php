<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
            ['category_id'=>null,'category_name'=>'Shirts'],
            ['category_id'=>null,'category_name'=>'Jeans'],
            ['category_id'=>null,'category_name'=>'Jumpers'],
            ['category_id'=>null,'category_name'=>'Jackets'],
            ['category_id'=>null,'category_name'=>'Dress'],
            ['category_id'=>null,'category_name'=>'Skirts'],
            ['category_id'=>null,'category_name'=>'Shorts'],
            ['category_id'=>null,'category_name'=>'Shoes']
        ]);
    }
}
