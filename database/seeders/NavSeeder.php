<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('navigations')->insert([
            ['nav_id'=>null,'title'=>'Home','path'=>'/'],
            ['nav_id'=>null,'title'=>'Shop','path'=>'/products'],
            ['nav_id'=>null,'title'=>'Contact','path'=>'/contact'],
            ['nav_id'=>null,'title'=>'Author','path'=>'/author'],
        ]);
    }
}
