<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sizes')->insert([
            ['size_id'=>null,'size_name'=>'XS'],
            ['size_id'=>null,'size_name'=>'S'],
            ['size_id'=>null,'size_name'=>'M'],
            ['size_id'=>null,'size_name'=>'L'],
            ['size_id'=>null,'size_name'=>'XL'],
            ['size_id'=>null,'size_name'=>'XXL'],
        ]);
    }
}
