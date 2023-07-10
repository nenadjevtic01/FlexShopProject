<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('brands')->insert([
            ['brand_id'=>null,'brand_name'=>'Suima'],
            ['brand_id'=>null,'brand_name'=>'Fb Fashion'],
            ['brand_id'=>null,'brand_name'=>'GOMS'],
            ['brand_id'=>null,'brand_name'=>'BSFN']
        ]);
    }
}
