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
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(100)->create();
        /**Creating sub categories */
        \App\Models\Category::factory(450)->setRelation()->create();
        \App\Models\Product::factory(500)->create();
        

        
    }
}
