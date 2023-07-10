<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password=md5('tiqKYLSJ');
        $testPassword=md5('testNalog123');
        \DB::table('users')->insert([
            ['user_id'=>null,'first_name'=>'Nenad','last_name'=>'Jevtic','email'=>'nenad.jevtic.60.20@ict.edu.rs','password'=>$password,'username'=>'nenad.jevtic.60.20','role_id'=>1],
            ['user_id'=>null,'first_name'=>'Test','last_name'=>'Nalog','email'=>'testnalog@gmail.com','password'=>$testPassword,'username'=>'test.nalog.12','role_id'=>2]
        ]);
    }
}
