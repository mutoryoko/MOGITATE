<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProductsTableSeeder::class,
            SeasonsTableSeeder::class,
            ProductsSeasonsTableSeeder::class
        ]);
    }
}
