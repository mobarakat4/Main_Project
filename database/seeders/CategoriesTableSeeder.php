<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            //cats
            [
                'name' => 'Cats',
                'name_ar'=>'القطط',
                'description' => 'cat category', 
                'image'=>'cat.jpg', //change
                // Add other columns here
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // //dogs
            [
                'name' => 'Dogs',
                'name_ar'=>'الكلاب',
                'description' => 'dog category',
                'image'=>'dog.jpg', //change
                // Add other columns here
                'created_at' => now(),
                'updated_at' => now(),
            ],

            
        ];
        DB::table('categories')->insert($products);
    }
}
