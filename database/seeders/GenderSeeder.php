<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('genders')->insert([
            ['gender_id'=>null,'gender_name'=>'Male'],
            ['gender_id'=>null,'gender_name'=>'Female']
        ]);
    }
}
