<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            RoleSeeder::class,
            GenderSeeder::class,
            NavSeeder::class,
            UserSeeder::class,
            SizeSeeder::class
        ]);
    }
}
